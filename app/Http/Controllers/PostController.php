<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Repo\PostRepo;


class PostController extends Controller {
    public function get(): array {
        try {
            $posts = PostRepo::get();
        } catch(Exception $e) {
            return abort(500);
        }
        return $posts;
    }

    public function getOne(string $id): PostRepo {
        try {
            return PostRepo::getById($id);
        } catch(Exception $e) {
            return abort(500);
        }
    }

    public function update(Request $request, string $id) {
        try {
            $post = PostRepo::getById($id);
            if(is_null($post)) {
                return abort(404);
            }
            $post->title = $request->get('title');
            $post->text = $request->get('text');
            $post->save();
            return redirect()->route('post', $id);
        } catch(Exception $e) {
            return abort(500);
        }
    }

    public function new(Request $request) {
        try {
            $post = new PostRepo('', $request->get('title'), $request->get('text'), '');
            $id = $post->save();
            return redirect()->route('post', $id);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public static function generatePrettyDate($created_at) {
        $parsed_timestamp = \Carbon\Carbon::parse($created_at);
        $diffInDays = $parsed_timestamp->diffInDays(\Carbon\Carbon::now());
    
        if ($diffInDays > 30) {
            return $parsed_timestamp->diffInMonths(\Carbon\Carbon::now()) . ' months ago';
        } elseif ($diffInDays == 0) {
            return 'Today';
        } else {
            return $diffInDays . ' days ago';
        }
    }
}