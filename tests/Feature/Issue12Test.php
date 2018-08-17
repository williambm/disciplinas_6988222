<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Disciplina;
use App\User;

class Issue12Test extends TestCase
{
    public function testSearch()
    {
        // create a new user
        $user = factory(User::class)->create();
        $this->assertDatabaseHas('users', $user->toArray());
        $this->actingAs($user);

        // create a new disciplina to test
        $disciplina = factory(Disciplina::class)->create();
        $this->assertDatabaseHas('disciplinas', $disciplina->toArray());

        // search
        $response = $this->post('disciplinas/search', ['text' => substr($disciplina->titulo,7) ]);
        $response->assertSeeText(e($disciplina->titulo));

        // Clean everything
        $user->delete();
        $disciplina->delete();
    }

}
