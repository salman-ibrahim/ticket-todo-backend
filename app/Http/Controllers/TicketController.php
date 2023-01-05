<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create(Request $request) {
        try {
            $request->validate([
                'title' => 'required'
            ]);

            $data = $request->all();

            Ticket::create([
               'title' => $data['title'],
               'description' => $data['description'] ?? null
            ]);
        }
        catch (\Exception $ex) {
            return response(['message' => $ex], 400);
        }
    }

    public function delete() {
        // Delete the ticket
    }

    public function update() {
        // Update the ticket
    }
}
