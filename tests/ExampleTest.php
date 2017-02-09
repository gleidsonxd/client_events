<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    // public function testVisitMain()
    // {
    //     $this->visit('/form_evento')
    //         ->see('Cadastro Evento');
            
    // }

    public function testClickLink()
    {
        $this->visit('/')
            ->click('IFPB - Instituto Federal da Paraiba')
            ->seePageIs('http://www.ifpb.edu.br');
    }
    public function testClickEvento()
    {
        $this->visit('/eventos')
            ->select('Eventos','Listar Eventos')
            ->click('Listar Eventos')
            ->seePageIs('/eventos');
    }
    // public function testCreateEvento()
    // {
    //     $this->visit('/form_evento')
    //         ->type('Testes','nome')
    //         ->select('1','servicos[]')
    //         ->select('1','lugares[]')
    //         ->type('10/02/2017T11:00','data_ini')
    //         ->type('10/02/2017T12:00','data_fim')
    //         ->seePageIs('/eventoseors');
    // }
    
}
