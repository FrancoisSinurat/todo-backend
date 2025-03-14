<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;

class TaskController extends Controller {
    // Menampilkan semua task
    public function index() {
        return TaskResource::collection(Task::all());
    }

    // Menyimpan task baru
    public function store(Request $request) {
        $task = Task::create($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]));

        return new TaskResource($task);
    }

    // Mengupdate status task (selesai/tidak selesai)
    public function update(Request $request, Task $task) {
        $task->update($request->validate([
            'is_completed' => 'required|boolean',
        ]));

        return new TaskResource($task);
    }

    // Menghapus task
    public function destroy(Task $task) {
        $task->delete();
        return response()->json(null, 204);
    }
}