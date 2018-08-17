<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Turma;
use App\Disciplina;

class Issue9Test extends TestCase
{
    public function testTurmaInsert()
    {
        // create a new disciplina object
        $disciplina = factory(Disciplina::class)->create();

        // verify if form exists
        $response = $this->get("/disciplinas/{$disciplina->id}/turmas/create");
        $response->assertStatus(200);

        // submit a new turma using webform, date in pt-br format
        $turma = new \App\Turma;
        $turma->ministrante = 'Zezinho';
        $turma->inicio = '10/12/2011';
        $turma->fim = '20/01/2012';
        $turma->disciplina_id = $disciplina->id;

        $response = $this->post("/disciplinas/{$disciplina->id}/turmas", $turma->toArray());
        $response->assertRedirect("/disciplinas/{$disciplina->id}");

        // check if new turma is database
        $this->assertDatabaseHas('turmas', [
            'ministrante' => $turma->ministrante,
            'disciplina_id' => $disciplina->id,
        ]);

        // verifica se tem um botão para criar turma
        $response = $this->get("/disciplinas/{$disciplina->id}");
        $response->assertSee("disciplinas/{$disciplina->id}/turmas/create");

        // Clean everything
        $turma = Turma::where('ministrante',$turma->ministrante)->
                        where('disciplina_id',$turma->disciplina_id)->first();
        $turma->delete();
        $disciplina->delete();
    }

}
