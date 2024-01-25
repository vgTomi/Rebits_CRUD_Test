<?php

namespace Tests\Feature;



use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\DB;

class CrudControllerTest extends TestCase
{
    /** @test */
    public function testIndex()
    {
        // Arrange
        $controller = new CrudController();

        // Act
        $response = $this->get('/');  // Reemplaza '/ruta' con la ruta que estás probando

        // Assert
        $response->assertViewIs('welcome'); // Verifica que la vista devuelta sea 'welcome'
        $response->assertViewHas('data');    // Verifica que la vista tiene la variable $data
    }

}
