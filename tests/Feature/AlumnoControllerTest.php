<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Alumno;

class AlumnoControllerTest extends TestCase
{
    use RefreshDatabase; // Reinicia la base de datos en cada prueba

    /**
     * Prueba que la lista de alumnos sea accesible.
     */
    public function test_index_devuelve_vista_correcta(): void
    {
        $response = $this->get('/alumnos');
        $response->assertStatus(200);
        $response->assertViewIs('alumnos.index');
    }

    /**
     * Prueba que el formulario de creación sea accesible.
     */
    public function test_create_devuelve_vista_correcta(): void
    {
        $response = $this->get('/alumnos/create');
        $response->assertStatus(200);
        $response->assertViewIs('alumnos.create');
    }

    /**
     * Prueba que se pueda crear un alumno.
     */
    public function test_store_crea_alumno_correctamente(): void
    {
        $data = [
            'nombre' => 'Daniel Zuñiga',
            'correo' => 'Dani@example.com',
            'fecha_nacimiento' => '2022-01-12',
            'ciudad' => 'Guadalajara',
        ];

        $response = $this->post('/alumnos', $data);
        $response->assertRedirect('/alumnos');
        $this->assertDatabaseHas('alumnos', $data);
    }

    /**
     * Prueba que se pueda ver un alumno específico.
     */
    public function test_show_muestra_alumno(): void
    {
        $alumno = Alumno::factory()->create(); // Crea un alumno de prueba

        $response = $this->get("/alumnos/{$alumno->id}");
        $response->assertStatus(200);
        $response->assertViewIs('alumnos.show');
        $response->assertViewHas('alumno', $alumno);
    }

    /**
     * Prueba que el formulario de edición sea accesible.
     */
    public function test_edit_devuelve_vista_correcta(): void
    {
        $alumno = Alumno::factory()->create();

        $response = $this->get("/alumnos/{$alumno->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('alumnos.editar-alumno'); // Ajusta según el nombre de tu vista
        $response->assertViewHas('alumno', $alumno);
    }

    /**
     * Prueba que se pueda actualizar un alumno.
     */
    public function test_update_actualiza_alumno(): void
    {
        $alumno = Alumno::factory()->create();
        $data = [
            'nombre' => 'andrea',
            'correo' => 'andy03473@gmailcom',
            'fecha_nacimiento' => '2001-10-05',
            'ciudad' => 'Barcelona',
        ];

        $response = $this->put("/alumnos/{$alumno->id}", $data);
        $response->assertRedirect('/alumnos');
        $this->assertDatabaseHas('alumnos', $data);
    }

    /**
     * Prueba que se pueda eliminar un alumno.
     */
    public function test_destroy_elimina_alumno(): void
    {
        $alumno = Alumno::factory()->create();

        $response = $this->delete("/alumnos/{$alumno->id}");
        $response->assertRedirect('/alumnos');
        $this->assertDatabaseMissing('alumnos', ['id' => $alumno->id]);
    }
}