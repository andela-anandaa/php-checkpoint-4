<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserProfileTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * use can change their profile details
     */
    public function testCanChangeProfile()
    {
        $user = factory('KnowTube\User')->create();

        $this
            ->actingAs($user)
            ->visit('profile')
            ->type('Johnny Batman', 'name')
            ->attach(__DIR__  . '/../resources/assets/nyancat.jpeg', 'avatar')
            ->press('Update');

        $this->seeInDatabase('users', ['name' => 'Johnny Batman']);
        $this->seeInDatabase('users', ['avatar' => url('/') . '/uploads/nyancat.jpeg']);
    }
}
