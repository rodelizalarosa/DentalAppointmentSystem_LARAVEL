<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentService;

class AppointmentServiceController extends Controller
{
   // GET /get-appointmentServices
    public function getAppointmentServices()
    {
        $services = AppointmentServices::with(['appointment', 'dentalService', 'treatmentStatus'])->get();
        return response()->json($services);
    }

    // POST /add-appointmentService
    public function addAppointmentService(Request $request)
    {
        $validated = $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'dental_service_id' => 'required|exists:dental_services,id',
            'treatment_status_id' => 'required|exists:treatment_statuses,id',
            'total_cost' => 'required|numeric|min:0',
        ]);

        $appointmentService = AppointmentServices::create($validated);

        return response()->json([
            'message' => 'Appointment Service created successfully.',
            'appointment_service' => $appointmentService
        ]);
    }

    // PUT /edit-appointmentService/{id}
    public function editAppointmentService(Request $request, $id)
    {
        $appointmentService = AppointmentServices::findOrFail($id);

        $validated = $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'dental_service_id' => 'required|exists:dental_services,id',
            'treatment_status_id' => 'required|exists:treatment_statuses,id',
            'total_cost' => 'required|numeric|min:0',
        ]);

        $appointmentService->update($validated);

        return response()->json([
            'message' => 'Appointment Service updated successfully.',
            'appointment_service' => $appointmentService
        ]);
    }

    // DELETE /delete-appointmentService/{id}
    public function deleteAppointmentService($id)
    {
        $appointmentService = AppointmentServices::findOrFail($id);
        $appointmentService->delete();

        return response()->json([
            'message' => 'Appointment Service deleted successfully.'
        ]);
    }
}
