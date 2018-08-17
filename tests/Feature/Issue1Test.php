<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Disciplina;

class Issue1Test extends TestCase
{
    public function testModelDisciplina()
    {
        // create a new disciplina
        $disciplina = factory(Disciplina::class)->create();
        $this->assertDatabaseHas('disciplinas', $disciplina->toArray());

        // Clean everything
        $disciplina->delete();
    }
}
