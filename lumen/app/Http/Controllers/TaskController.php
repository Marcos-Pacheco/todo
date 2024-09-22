<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Listar todas as tarefas
    public function index()
    {
        return response()->json(Task::all());
    }

    // Criar nova tarefa
    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    // Mostrar uma tarefa específica
    public function show($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }
        return response()->json($task);
    }

    // Atualizar uma tarefa
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }
        $task->update($request->all());
        return response()->json($task);
    }

    // Excluir uma tarefa
    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }
        $task->delete();
        return response()->json(['message' => 'Tarefa excluída com sucesso']);
    }
}
