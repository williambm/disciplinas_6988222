<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Disciplina;

class Issue3Test extends TestCase
{
    public function testDisciplinaShow()
    {
        // create a new disciplina
        $disciplina = factory(Disciplina::class)->create();
        $this->assertDatabaseHas('disciplinas', $disciplina->toArray());

        // test if route exists
        $response = $this->get("/disciplinas/{$disciplina->id}");
        $response->assertStatus(200);

        // verify if view receive $disciplina
        $response->assertViewHas('disciplina');

        // verify if disciplina field appears at /disciplinas/ID
        $response->assertSeeText($disciplina->titulo);
        $response->assertSeeText($disciplina->ementa);

        // verify if the button is at index
        $response = $this->get("/");
        $response->assertSee("disciplinas/{$disciplina->id}");

        // clean everything    
        $disciplina->delete();
    }

}
