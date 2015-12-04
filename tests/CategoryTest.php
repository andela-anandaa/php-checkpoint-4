<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
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
     * user can create a category
     */
    public function testCanCreateCategory()
    {
        $user = factory('KnowTube\User')->create();

        $this->actingAs($user)
             ->visit('categories/create')
             ->type('mycategory', 'title')
             ->press('Add');

        $this->seeInDatabase('categories', [
            'title' => 'mycategory'
        ]);
    }

}
