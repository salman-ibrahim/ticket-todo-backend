<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create(Request $request) {
        try {
            $request->validate([
                'ticketId' => 'required',
                'task' => 'required'
            ]);

            $data = $request->all();

            $record = Todo::create([
                'ticket_id' => $data['ticketId'],
                'task' => $data['task']
            ]);

            return response(['task_id' => $record->id], 200);
        }
        catch (\Exception $ex) {
            return response(['message' => $ex], 400);
        }
    }

    public function markCompleted(Request $request) {
        try {
            $request->validate([
                'id' => 'required'
            ]);

            $data = $request->all();

            $record = Todo::find($data['id']);

            $record->status = "COMPLETED";
            $record->save();
        }
        catch (\Exception $ex) {

        }
    }
    public function delete() {
        // Delete the task
    }

    public function update() {
        // Update the task
    }
}
