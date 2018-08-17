<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Disciplina;
use App\Turma;

class Issue7Test extends TestCase
{
    public function testModelTurmas()
    {
        // create a new turma
        $turma = factory(Turma::class)->create();
        $this->assertDatabaseHas('turmas', $turma->toArray());

        // Clean everything
        $disciplina = $turma->disciplina;
        $turma->delete();
        $disciplina->delete();
    }
}
