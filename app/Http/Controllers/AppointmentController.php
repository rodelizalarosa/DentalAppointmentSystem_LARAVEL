<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
   // GET /get-appointments
    public function getAppointments()
    {
        $appointments = Appointment::with(['patient', 'dentist', 'appointmentStatus'])->get();
        return response()->json($appointments);
    }

    // POST /add-appointment
    public function addAppointment(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'dentist_id' => 'required|exists:dentists,id',
            'appointment_status_id' => 'required|exists:appointment_statuses,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i:s',
        ]);

        $appointment = Appointment::create($validated);

        return response()->json([
            'message' => 'Appointment created successfully.',
            'appointment' => $appointment
        ]);
    }

    // PUT /edit-appointment/{id}
    public function editAppointment(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'dentist_id' => 'required|exists:dentists,id',
            'appointment_status_id' => 'required|exists:appointment_statuses,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i:s',
        ]);

        $appointment->update($validated);

        return response()->json([
            'message' => 'Appointment updated successfully.',
            'appointment' => $appointment
        ]);
    }

    // DELETE /delete-appointment/{id}
    public function deleteAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return response()->json([
            'message' => 'Appointment deleted successfully.'
        ]);
    }
}
