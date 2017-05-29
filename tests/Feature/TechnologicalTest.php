<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;

class TechnologicalTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNewTechnologicalRegistration()
    {
    	$user = factory(User::class)->create([
            'email' => 'test@laravel.com',
            'password' => 'abrete123'
        ]);

    	$response = $this->actingAs($user)
                    ->get('/technologicals')
                    ->type("Tecnologico de colima",'name')
		    		->type('13460326', 'it_Key')
		    		->press('Agregar Tecnologico')
		    		->see("Tecnologico creado satisfactoriamente");
       
    }
}
