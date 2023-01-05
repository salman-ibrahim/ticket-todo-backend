<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create(Request $request) {
        try {
            $request->validate([
                'ticket_id' => 'required',
                'task' => 'required'
            ]);

            $data = $request->all();

            Todo::create([
                'ticket_id' => $data['ticket_id'],
                'task' => $data['task']
            ]);

            return response(['message' => 'success'], 200);
        }
        catch (\Exception $ex) {
            return response(['message' => $ex], 400);
        }
    }

    public function delete() {
        // Delete the task
    }

    public function update() {
        // Update the task
    }
}
