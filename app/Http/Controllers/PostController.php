<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Database\QueryException;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;




class PostController extends Controller {
    public function get() {
        $posts = DB::table('posts')->orderBy('created_at', 'desc')->get();
        return $posts;
    }

    public function getOne($id) {
        $posts = DB::table('posts')->where('id', '=', $id)->first();
        return $posts;
    }

    public function update(Request $request, $id) {
        try {
            DB::table('posts')
                ->where('id', $id)
                ->update(['title' => $request->get('title'), 'text' => $request->get('text')]);
        } catch(Exception $e) {
            return 'unknown error';
        }
        return 'ok';
    }

    public function new(Request $request) {
        try {
            DB::table('posts')->insert([
                'title' => $request->get('title'),
                'text' => $request->get('text'),
                'created_at' => now(),
            ]);
        } catch(Exception $e) {
            return $e->getMessage();
        }
        return 'ok';
    }
}