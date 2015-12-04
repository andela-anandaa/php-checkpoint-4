<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * user can login
     */
    public function testCanLogin()
    {
        $this->seed('UserTableSeeder');

        $this->visit('/auth/login')
             ->type('userone@userone.com', 'email')
             ->type('userone', 'password')
             ->press('Login')
             ->see('welcome, userone');
    }
}
