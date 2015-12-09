<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * user can register
     */
    public function testCanRegister()
    {
        $username = "testregister";

        $this->visit('/auth/register')
             ->type($username, 'name')
             ->type('test@register.com', 'email')
             ->type('testpassword', 'password')
             ->type('testpassword', 'password_confirmation')
             ->press('Register');

        $this->seeInDatabase('users', ['name' => $username]);
    }
}
