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

    public function postProvider(): array {
        return [
            [
                '1',
                'xcvxcvvxc',
                'ewtrtewtrewg',
                '',
            ]
        ];
    }

    /**
     * Test creating a new post repo.
     * @dataProvider postProvider
    */
    public function testCreatePostRepo(string $id, string $title, string $text, string $created_at) {
        $postRepo = new PostRepo($id, $title, $text, $created_at);
        $this->assertTrue($postRepo->id == $id);
        $this->assertTrue($postRepo->title == $title);
        $this->assertTrue($postRepo->text == $text);
        $this->assertTrue($postRepo->created_at == $created_at);
    }

    /**
     * Test saving and retrieving post or two.
     * @depends testCreatePostRepo
     * @dataProvider postProvider
    */
    public function testSaveRetrievePost(string $id, string $title, string $text, string $created_at) {
        $postRepo = new PostRepo($id, $title, $text, $created_at);
        $id = $postRepo->save();
        $this->assertTrue($id == '1');

        $post = PostRepo::getById($id);
        $this->assertTrue($post->id == $id);
        $this->assertTrue($post->title == $title);
        $this->assertTrue($post->text == $text);

        $id = $postRepo->save();
        $this->assertTrue($id == '2');

        $post = PostRepo::getById($id);
        $this->assertTrue($post->id == $id);
        $this->assertTrue($post->title == $title);
        $this->assertTrue($post->text == $text);
    }

    /**
     * Test saving a few posts and getting them all back.
     * @depends testCreatePostRepo
    */
    public function testSaveGetPosts() {
        // DB auto increment doesn't get reset by RefreshDatabase, ugly hack
        DB::table('posts')->truncate();

        $posts = [
            '1' => new PostRepo(1, 'ab', 'bd', ''),
            '2' => new PostRepo(2, 'cd', 'fg', ''),
            '3' => new PostRepo(3, 'bh', 'zg', ''),
        ];

        foreach ($posts as $id => $post) {
            $post->save();
        }

        $fetchedPosts = PostRepo::get();

        $this->assertTrue(count($posts) == count($fetchedPosts));

        foreach ($fetchedPosts as $fetched) {
            $this->assertTrue($posts[$fetched->id]->title == $fetched->title);
            $this->assertTrue($posts[$fetched->id]->text == $fetched->text);
        }
    }
}
