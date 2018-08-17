<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Disciplina;

class Issue6Test extends TestCase
{
    public function testDisciplinaDelete()
    {
        // create a new disciplina
        $disciplina = factory(Disciplina::class)->create();
        $this->assertDatabaseHas('disciplinas', $disciplina->toArray());

        // delete the disciplina created before
        $response = $this->delete("disciplinas/{$disciplina->id}");
        $response->assertRedirect('/');

        // verifica se na home ela sumiu tb
        $response = $this->get("/");
        $response->assertDontSee("disciplinas/{$disciplina->id}");
    }

}
