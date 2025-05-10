<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TreatmentStatus;

class TreatmentStatusController extends Controller
{
    // GET /get-treatmentStatuses
    public function getTreatmentStatuses()
    {
        $statuses = TreatmentStatus::all();
        return response()->json($statuses);
    }

    // POST /add-treatmentStatus
    public function addTreatmentStatus(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:treatment_statuses,name',
        ]);

        $status = TreatmentStatus::create($validated);

        return response()->json([
            'message' => 'Treatment status created successfully.',
            'status' => $status
        ]);
    }

    // PUT /edit-treatmentStatus/{id}
    public function editTreatmentStatus(Request $request, $id)
    {
        $status = TreatmentStatus::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|unique:treatment_statuses,name,' . $status->id,
        ]);

        $status->update($validated);

        return response()->json([
            'message' => 'Treatment status updated successfully.',
            'status' => $status
        ]);
    }

    // DELETE /delete-treatmentStatus/{id}
    public function deleteTreatmentStatus($id)
    {
        $status = TreatmentStatus::findOrFail($id);
        $status->delete();

        return response()->json([
            'message' => 'Treatment status deleted successfully.'
        ]);
    }
}
