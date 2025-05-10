<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentStatus;

class AppointmentStatusController extends Controller
{
    // GET /get-appointmentStatuses
    public function getAppointmentStatuses()
    {
        $statuses = AppointmentStatus::all();
        return response()->json($statuses);
    }

    // POST /add-appointmentStatus
    public function addAppointmentStatus(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:appointment_statuses,name',
        ]);

        $status = AppointmentStatus::create($validated);

        return response()->json([
            'message' => 'Appointment status created successfully.',
            'status' => $status
        ]);
    }

    // PUT /edit-appointmentStatus/{id}
    public function editAppointmentStatus(Request $request, $id)
    {
        $status = AppointmentStatus::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|unique:appointment_statuses,name,' . $status->id,
        ]);

        $status->update($validated);

        return response()->json([
            'message' => 'Appointment status updated successfully.',
            'status' => $status
        ]);
    }

    // DELETE /delete-appointmentStatus/{id}
    public function deleteAppointmentStatus($id)
    {
        $status = AppointmentStatus::findOrFail($id);
        $status->delete();

        return response()->json([
            'message' => 'Appointment status deleted successfully.'
        ]);
    }
}
