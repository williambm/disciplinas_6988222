<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Disciplina;

class Issue2Test extends TestCase
{
    public function testDisciplinaIndex()
    {
        // test root (/) exist 
        $response = $this->get('/');
        $response->assertStatus(200);

        // test if route exists
        $response = $this->get('/disciplinas');
        $response->assertStatus(200);

        // verify if view receive $disciplinas
        $response->assertViewHas('disciplinas');

        // create a new disciplina and see if it is at web
        $disciplina = factory(Disciplina::class)->create();
        $response = $this->get('/');
        $response->assertSeeText($disciplina->titulo);

        // Clean everything
        $disciplina->delete();
        
    }

}
