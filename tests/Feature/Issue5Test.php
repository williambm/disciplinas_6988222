<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Disciplina;

class Issue5Test extends TestCase
{
    public function testDisciplinaEdit()
    {
        // create a new disciplina
        $disciplina = factory(Disciplina::class)->create();

        // verify if edit form route exists
        $response = $this->get("/disciplinas/{$disciplina->id}/edit");
        $response->assertStatus(200);

        // edit the disciplina created before
        $disciplina->titulo = 'edited';
        $response = $this->patch("disciplinas/{$disciplina->id}", $disciplina->toArray());
        $response->assertRedirect("/disciplinas/{$disciplina->id}");

        // check if the edit disciplina is in database
        $this->assertDatabaseHas('disciplinas', $disciplina->toArray());

        // edited content appears at home
        $response = $this->get("/");
        $response->assertSee("disciplinas/{$disciplina->id}");
        $response->assertSeeText($disciplina->titulo);

        // verify button
        $response->assertSee("disciplinas/{$disciplina->id}/edit");

        // clean everything    
        $disciplina->delete();
    }

}
