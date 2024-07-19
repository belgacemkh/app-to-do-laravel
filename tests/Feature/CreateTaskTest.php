<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateTaskTest extends TestCase
{
    use RefreshDatabase;
    public function test_auth_can_create_task()
    {
        $user = User::factory(User::class)->create();
        $response = $this->actingAs($user)->post('/tasks', [
            'title' => 'Ma nouvelle tâche',
            'description' => 'Tous les détails de ma nouvelle tâche',
        ]);
        $this->assertDatabaseHas('tasks', [
            'title' => 'Ma nouvelle tâche'
        ]);
        $this->get('/tasks')->assertSee('Ma nouvelle tâche');
    }
}
