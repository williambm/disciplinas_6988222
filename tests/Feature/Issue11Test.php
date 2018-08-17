<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class Issue11Test extends TestCase
{
    public function testMiddleware()
    {
        // create a new user
        $user = factory(User::class)->create();
        $this->assertDatabaseHas('users', $user->toArray());

        // index must be public
        $response = $this->get('/');
        $response->assertStatus(200);

        // button login
        $response = $this->get("/");
        $response->assertSee("Login");

        // disciplinas create must be private
        $response = $this->get('/disciplinas/create');
        $response->assertStatus(302);


        // disciplinas store must be private
        $response = $this->post('/disciplinas');
        $response->assertStatus(302);

        $this->actingAs($user);

        // disciplinas create logged
        $response = $this->get('/disciplinas/create');
        $response->assertStatus(200);

        // button Sair
        $response = $this->get("/");
        $response->assertSee("Sair");
       
        // Clean everything
        $user->delete();
    }
}
