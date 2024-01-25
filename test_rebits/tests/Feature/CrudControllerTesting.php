<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\CrudController;

class CrudControllerTesting extends TestCase
{
    /** @test */
    public function index_method_returns_view_with_data()
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
