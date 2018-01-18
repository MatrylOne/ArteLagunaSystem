<?php

namespace Tests\Unit;

use App;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;


    /**
     *Testing if user is created successfully
     */
    public function testCreateUser()
    {

        $user = App\User::create([
            'firstName' => 'Adam',
            'lastName' => 'Waniak',
            'email' => 'awaniak@me.com',
            'password' => bcrypt("uzytkownik123"),
            'country' => "Niemcy",
            'isActive' => true,
            'isAdmin' => false,
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'awaniak@me.com'
        ]);
        $user->delete();
    }

    public function testDeleteUser()
    {

        $user = App\User::create([
            'firstName' => 'Adam',
            'lastName' => 'Waniak',
            'email' => 'awaniak@me.com',
            'password' => bcrypt("uzytkownik123"),
            'country' => "Niemcy",
            'isActive' => true,
            'isAdmin' => false,
        ]);
        $user->delete();
        $this->assertDatabaseMissing('users', [
            'email' => 'awaniak@me.com'
        ]);

    }


    public function testActivateAccount()
    {
        $user = App\User::create([
            'firstName' => 'Adam',
            'lastName' => 'Waniak',
            'email' => 'awaniak@me.com',
            'password' => bcrypt("uzytkownik123"),
            'country' => "Niemcy",
            'isActive' => false,
            'isAdmin' => false,
        ]);
        $user->activate();
        $this->assertDatabaseHas('users', [
            'email' => 'awaniak@me.com',
            'isActive' => 1]);
        $user->delete();

    }

    public function testGiveAdmin(){
        $user = App\User::create([
            'firstName' => 'Adam',
            'lastName' => 'Waniak',
            'email' => 'awaniak@me.com',
            'password' => bcrypt("uzytkownik123"),
            'country' => "Niemcy",
            'isActive' => false,
            'isAdmin' => false,
        ]);
        $user->giveAdmin();
        $this->assertDatabaseHas('users', [
            'email' => 'awaniak@me.com',
            'isAdmin' => 1]);
        $user->delete();
    }


    public function testTakeAdmin(){
        $user = App\User::create([
            'firstName' => 'Adam',
            'lastName' => 'Waniak',
            'email' => 'awaniak@me.com',
            'password' => bcrypt("uzytkownik123"),
            'country' => "Niemcy",
            'isActive' => false,
            'isAdmin' => true,
        ]);

        $user->takeAdmin();
        $this->assertDatabaseHas('users', [
            'email' => 'awaniak@me.com',
            'isAdmin' => 0]);
        $user->delete();


    }

}
