<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Disciplina;
use App\Turma;

class Issue10Test extends TestCase
{

    public function testShowTurmas()
    {
        // create a new turma
        $turma = factory(Turma::class)->create();
        $this->assertDatabaseHas('turmas', $turma->toArray());

        // verify if turma is show at show disciplina page
        $response = $this->get("/disciplinas/{$turma->disciplina_id}");
        $response->assertSee(e($turma->ministrante));

        // Clean everything
        $disciplina = $turma->disciplina;
        $turma->delete();
        $disciplina->delete();
    }

}
