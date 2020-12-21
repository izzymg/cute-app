<?php

namespace Tests\Feature;

use Carbon\Carbon;

use App\Http\Repo\PostRepo;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;

use Tests\TestCase;

class PostRepoTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();
    }

    protected function tearDown():void {
        parent::tearDown();
    }

    /**
     * Test creating a new post repo. No actual DB ops.
    */
    public function testCreatePostRepo() {
        $id = '1';
        $title = 'Some meaningful title';
        $text = 'A highly sophisticated blog post';
        $created_at = '';
        $postRepo = new PostRepo($id, $title, $text, $created_at);
        $this->assertTrue($postRepo->id == $id);
        $this->assertTrue($postRepo->title == $title);
        $this->assertTrue($postRepo->text == $text);
        $this->assertTrue($postRepo->created_at == $created_at);
    }

    /**
     * Test saving, updating and retrieving post.
     * @depends testCreatePostRepo
    */
    public function testSaveRetrievePost() {
        // Save a new post
        $title = 'a';
        $text = 'b';

        $postRepo = new PostRepo('', $title, $text, '');
        $id = $postRepo->save();
        $this->assertTrue($id == '1');

        // Same data should be retrievable
        $post = PostRepo::getById($id);
        $this->assertTrue($post->id == '1');
        $this->assertTrue($post->title == $title);
        $this->assertTrue($post->text == $text);

        // Change & update
        $newText = 'cd';
        $newTitle = 'sdvdvf';
        $post->text = $newText;
        $post->title = $newTitle;
        $post->save();

        // Retrieve, should be the same ID with new data
        $updatedPost = PostRepo::getById($id);
        $this->assertTrue($updatedPost->id == '1');
        $this->assertTrue($updatedPost->title == $newTitle);
        $this->assertTrue($updatedPost->text == $newText);
    }

    /**
     * Test saving a few posts and getting them all back.
     * @depends testCreatePostRepo
    */
    public function testSaveGetPosts() {
        // DB auto increment doesn't get reset by RefreshDatabase, ugly hack
        DB::table('posts')->truncate();

        $posts = [
            '1' => new PostRepo('', 'ab', 'bd', ''),
            '2' => new PostRepo('', 'cd', 'fg', ''),
            '3' => new PostRepo('', 'bh', 'zg', ''),
        ];

        foreach ($posts as $id => $post) {
            $post->save();
        }

        $fetchedPosts = PostRepo::get();

        $this->assertTrue(count($posts) == count($fetchedPosts));

        // Match all posts in database with created ones
        foreach ($fetchedPosts as $fetched) {
            $this->assertTrue($posts[$fetched->id]->title == $fetched->title);
            $this->assertTrue($posts[$fetched->id]->text == $fetched->text);
        }
    }
}
