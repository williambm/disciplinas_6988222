<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Disciplina;
use App\Turma;

class Issue8Test extends TestCase
{
    public function testRelashions()
    {

        $d = new Disciplina;
        $d->ementa = 'Filosofia Irlandesa';
        $d->titulo = "Filosofia XX";
        $d->save();

        $t = new Turma;
        $t->ministrante = 'José Pedro';
        $t->inicio = '2015-10-10';
        $t->fim = '2016-10-10';
        $t->disciplina_id = $d->id;
        $t->save();

        // verify if it is possible to access disciplina by turma
        $this->assertEquals($d->ementa, $t->disciplina->ementa);

        // verify if it is possible to access turma by disciplina
        $this->assertEquals($d->turmas[0]->ministrante, $t->ministrante);

       // Clean everything
        $t->delete();
        $d->delete();
    }
}
