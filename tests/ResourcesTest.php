<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use KnowTube\Resource;

class ResourcesTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * user can create resource
     */
    public function testCanCreateResource()
    {
        $category = factory('KnowTube\Category')->create();

        $user = factory('KnowTube\User')->create();

        $this->actingAs($user)
             ->visit('resources/create')
             ->type('testVid', 'title')
             ->type('https://www.youtube.com/embed/vhJik9S9nxg', 'url')
             ->type('a test', 'description')
             ->select($category->id, 'category_id')
             ->press('Post');

        $this->seeInDatabase('resources', ['title' => 'testVid']);
    }

    /**
     * user can edit resource
     */
    public function testCanEditResource()
    {
        $user = factory('KnowTube\User')->create();
        $category = factory('KnowTube\Category')->create();

        $resource = factory('KnowTube\Resource')->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $categoryOther = factory('KnowTube\Category')->create();

        $this->actingAs($user)
             ->visit("resources/{$resource->id}/edit")
             ->type('testVidEdit', 'title')
             ->type('https://www.youtube.com/embed/vhJik9S9nxg', 'url')
             ->type('a test edit', 'description')
             ->select($categoryOther->id, 'category_id')
             ->press('Update');

        $this->seeInDatabase('resources', ['title' => 'testVidEdit']);
    }

    /**
     * user can delete resource
     */
    public function testCanDeleteResource()
    {
        $user = factory('KnowTube\User')->create();
        $category = factory('KnowTube\Category')->create();

        $resource = factory('KnowTube\Resource')->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $this->actingAs($user)
             ->visit("resources/{$resource->id}")
             ->press('delete');

        $resources = Resource::where(['title' => $resource->title])->get();

        $this->assertEquals(count($resources), 0);
    }

    /**
     * user can filter resource by category
     */
    public function testCanFilterResource()
    {
        $user = factory('KnowTube\User')->create();
        $category = factory('KnowTube\Category')->create();
        $category2 = factory('KnowTube\Category')->create();

        $resource = factory('KnowTube\Resource')->create([
            'title' => 'belongs_to_1',
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $resource = factory('KnowTube\Resource')->create([
            'title' => 'belongs_to_2',
            'user_id' => $user->id,
            'category_id' => $category2->id,
        ]);

        $this->visit("resources/category/{$category->id}")
             ->see('belongs_to_1');

        $this->visit("resources/category/{$category2->id}")
             ->see('belongs_to_2');
    }

}
