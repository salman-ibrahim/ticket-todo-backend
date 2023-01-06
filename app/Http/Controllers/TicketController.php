<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Todo;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create(Request $request) {
        try {
//            $request->validate([
//                'title' => 'required'
//            ]);

            $data = $request->all();
            $description = $data['description'] ?? null;
            $ticket = Ticket::create([
               'title' => $data['title'],
               'description' => $description
            ]);

            if(isset($data['tasks'])) {
                foreach ($data['tasks'] as $task) {
                    if (trim($task) != '') {
                        Todo::create([
                            'ticket_id' => $ticket['id'],
                            'task' => $task
                        ]);
                    }
                }
            }

            $resp = Ticket::where('id', $ticket->id)->with('todos')->first();

            return response(["ticket" => $resp], 200);

        }
        catch (\Exception $ex) {
            return response(['message' => $ex->getMessage()], 400);
        }
    }

    public function fetch(Request $request) {

        try {
            $resp = [];

            $data = Ticket::with('todos')->get();

            $resp["tickets"] = $data->toArray();

            return response($resp, 200);
        }
        catch (\Exception $ex) {
            return response(["message" => $ex->getMessage()], 400);
        }

    }

    public function delete() {
        // Delete the ticket
    }

    public function update() {
        // Update the ticket
    }
}
