<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Disciplina;

class Issue4Test extends TestCase
{
    public function testDisciplinaInsert()
    {
        // verify if form exists
        $response = $this->get("/disciplinas/create");
        $response->assertStatus(200);

        // submit a new disciplina to the form
        $disciplina = factory(Disciplina::class)->make();
        $response = $this->post('disciplinas', $disciplina->toArray());
        $response->assertRedirect('/');

        // check if new disciplina is database
        $this->assertDatabaseHas('disciplinas', $disciplina->toArray());

        // content is at home
        $response = $this->get("/");
        $response->assertSee("disciplinas/{$disciplina->id}");
        $response->assertSeeText(e($disciplina->titulo));

        // check button
        $response->assertSee("disciplinas/create");

        // clean everything
        $disciplina = Disciplina::where('titulo',$disciplina->titulo)->where('ementa',$disciplina->ementa)->first();
        $disciplina->delete();
    }

}
