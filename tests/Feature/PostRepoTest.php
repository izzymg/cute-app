<?php

namespace Tests\Feature;

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

    public function userProvider(): array {
        return [
            [
                '2',
                'Jake',
                'SomePasswordHash',
            ]
        ];
    }

    /**
     * Test creating a new post repo.
     * @dataProvider userProvider
    */
    public function testCreatePostRepo(string $id, string $title, string $text) {
        $postRepo = new PostRepo($id, $title, $text);
        $this->assertTrue($postRepo->id == $id);
        $this->assertTrue($postRepo->title == $title);
        $this->assertTrue($postRepo->text == $text);
    }

    /**
     * Test saving a post.
     * @depends testCreatePostRepo
     * @dataProvider userProvider
    */
    public function testSavePost(string $id, string $title, string $text) {
        $postRepo = new PostRepo($id, $title, $text);
        $id = $postRepo->save();
        $this->assertTrue($id == '1');
    }
}
