<?php

namespace App\Http\Repo;

use Exception;

use Illuminate\Support\Facades\DB;

class PostRepo {
    public $id = "";
    public $title = "";
    public $text = "";

    public function __construct($id, $title, $text) {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Saves this post into the database. Sets the created_at to now.
     * @return string The ID of the post.
    */
    public function save(): string {
        $id = DB::table('posts')->insertGetId([
            'title' => $this->title,
            'text' => $this->text,
            'created_at' => now(),
        ]);
        return $id;
    }
}