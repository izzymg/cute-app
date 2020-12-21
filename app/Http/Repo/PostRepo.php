<?php

namespace App\Http\Repo;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class PostRepo {
    public string $id;
    public string $title;
    public string $text;
    public string $created_at;

    public function __construct(string $id, string $title, string $text, string $created_at) {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->created_at = $created_at;
    }

    /**
     * Saves this post into the database.
     * If the ID of this post is blank, it will insert a new post. Otherwise
     * it will try to update an existing post.
     * @return string The ID of the post.
    */
    public function save(): string {
        if (strlen($this->id) == 0) {
            $id = DB::table('posts')->insertGetId([
                'title' => $this->title,
                'text' => $this->text,
                'created_at' => now(),
            ]);
            return $id;
        }
        DB::table('posts')
            ->where('id', $this->id)
            ->update(['title' => $this->title, 'text' => $this->text]);
        return $this->id;
    }

    /**
    * Retrieves a post by its ID.
    * @return PostRepo The post. 
    */
    public static function getById(string $id): PostRepo {
        $post = DB::table('posts')->where('id', '=', $id)->first();
        return new PostRepo($post->id, $post->title, $post->text, $post->created_at);
    }

    /**
     * Retrieves all posts.
     * @return array All posts.
    */
    public static function get(): array {
        $posts = DB::table('posts')->orderBy('created_at', 'desc')->get();
        return $posts->collect()->transform(function($post) {
            return new PostRepo($post->id, $post->title, $post->text, $post->created_at);
        })->toArray();
    }
}