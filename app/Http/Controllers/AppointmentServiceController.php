<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentServices;
use App\Models\DentalService;

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
            // no total_cost input needed, we calculate it
        ]);

        // Fetch cost from the dental service
        $service = DentalService::findOrFail($validated['dental_service_id']);
        $validated['total_cost'] = $service->cost;

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
            // no total_cost input needed, we calculate it again in case service changed
        ]);

        // Always re-fetch cost in case dental_service_id was updated
        $service = DentalService::findOrFail($validated['dental_service_id']);
        $validated['total_cost'] = $service->cost;

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
