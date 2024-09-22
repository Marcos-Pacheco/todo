<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use App\Models\Task;
use Laravel\Lumen\Testing\TestCase;

class TaskTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__ . '/../bootstrap/app.php';
    }

    public function test_can_create_task()
    {
        $data = [
            'title' => 'Nova Tarefa',
            'description' => 'Descrição da tarefa',
            'status' => 'A Fazer',
        ];

        $this->post('/tasks', $data)
            ->seeStatusCode(201)
            ->seeJson($data)
            ->seeInDatabase('tasks',$data);
    }

    public function test_can_list_tasks()
    {
        $tasks = Task::factory()->count(2)->create();

        $this->get('/tasks')
            ->seeStatusCode(200)
            ->seeJson($tasks[0]->toArray())
            ->seeJson($tasks[1]->toArray());
    }

    public function test_can_show_task()
    {
        $task = Task::factory()->create();

        $this->get("/tasks/{$task->id}")
            ->seeStatusCode(200)
            ->seeJson($task->toArray());
    }

    public function test_can_update_task()
    {
        $task = Task::factory()->create();

        $updatedData = [
            'title' => 'Tarefa Atualizada',
            'description' => 'Descrição atualizada',
            'status' => 'Feita',
        ];

        $this->put("/tasks/{$task->id}", $updatedData)
            ->seeStatusCode(200)
            ->seeJson($updatedData)
            ->seeInDatabase('tasks', array_merge(['id' => $task->id], $updatedData));
    }

    public function test_can_delete_task()
    {
        $task = Task::factory()->create();

        $this->delete("/tasks/{$task->id}")
            ->seeStatusCode(200)
            ->seeJson(['message' => 'Tarefa excluída com sucesso']);

        // Verificando se foi removido
        $this->get("/tasks/{$task->id}")
            ->seeStatusCode(404);
    }
}
