<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dentist;
use App\Models\User;

class DentistController extends Controller
{
   // Get all dentists with associated user info
    public function getDentists()
    {
        $dentists = Dentist::with('user')->get();
        return response()->json(['dentists' => $dentists]);
    }

    // Add a new dentist
    public function addDentist(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id', 'unique:dentists,user_id'],
            'specialization' => ['required', 'string', 'max:255'],
        ]);

        $dentist = Dentist::create([
            'user_id' => $request->user_id,
            'specialization' => $request->specialization,
        ]);

        return response()->json(['message' => 'Dentist added successfully', 'dentist' => $dentist]);
    }

    // Update dentist info
    public function editDentist(Request $request, $id)
    {
        $dentist = Dentist::find($id);

        if (!$dentist) {
            return response()->json(['message' => 'Dentist not found'], 404);
        }

        $request->validate([
            'user_id' => 'required|unique:dentists,user_id,' . $dentist->id,
            'specialization' => ['required', 'string', 'max:255'],
        ]);

        $dentist->update([
            'user_id' => $request->user_id,
            'specialization' => $request->specialization,
        ]);

        return response()->json(['message' => 'Dentist updated successfully', 'dentist' => $dentist]);
    }

    // Delete a dentist
    public function deleteDentist($id)
    {
        $dentist = Dentist::find($id);

        if (!$dentist) {
            return response()->json(['message' => 'Dentist not found'], 404);
        }

        $dentist->delete();

        return response()->json(['message' => 'Dentist deleted successfully']);
    }
}
