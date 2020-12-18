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
        try {
            $posts = DB::table('posts')->orderBy('created_at', 'desc')->get();
        } catch(Exception $e) {
            return abort(500);
        }
        return $posts;
    }

    public function getOne($id) {
        try {
            $posts = DB::table('posts')->where('id', '=', $id)->first();
            return $posts;
        } catch(Exception $e) {
            return abort(500);
        }
    }

    public function update(Request $request, $id) {
        try {
            DB::table('posts')
                ->where('id', $id)
                ->update(['title' => $request->get('title'), 'text' => $request->get('text')]);
        } catch(Exception $e) {
            return abort(500);
        }
        return 'Post updated';
    }

    public function new(Request $request) {
        try {
            $id = DB::table('posts')->insertGetId([
                'title' => $request->get('title'),
                'text' => $request->get('text'),
                'created_at' => now(),
            ]);
            return redirect()->route('post', $id);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}