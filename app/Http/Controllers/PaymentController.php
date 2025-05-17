<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\AppointmentServices;

class PaymentController extends Controller
{
   // GET /get-payments
    public function getPayments()
    {
        $payments = Payment::with(['appointmentService', 'paymentStatus'])->get();
        return response()->json($payments);
    }

    // POST /add-payment
    public function addPayment(Request $request)
    {
        $validated = $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'payment_status_id' => 'required|exists:payment_statuses,id',
            'payment_date' => 'required|date',
        ]);

        // Fetch all services for this appointment
        $services = AppointmentServices::where('appointment_id', $validated['appointment_id'])->get();

        if ($services->isEmpty()) {
            return response()->json([
                'message' => 'No appointment services found for this appointment.'
            ], 404);
        }

        $totalAmount = $services->sum('total_cost');

        $payment = Payment::create([
            'appointment_id' => $validated['appointment_id'],
            'payment_status_id' => $validated['payment_status_id'],
            'amount' => $totalAmount,
            'payment_date' => $validated['payment_date'],
        ]);

        return response()->json([
            'message' => 'Payment created successfully.',
            'payment' => $payment
        ]);
    }


    // PUT /edit-payment/{id}
    public function editPayment(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $validated = $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'payment_status_id' => 'required|exists:payment_statuses,id',
            'payment_date' => 'required|date',
        ]);

        $services = AppointmentServices::where('appointment_id', $validated['appointment_id'])->get();

        if ($services->isEmpty()) {
            return response()->json([
                'message' => 'No appointment services found for this appointment.'
            ], 404);
        }

        $totalAmount = $services->sum('total_cost');

        $payment->update([
            'appointment_id' => $validated['appointment_id'],
            'payment_status_id' => $validated['payment_status_id'],
            'amount' => $totalAmount,
            'payment_date' => $validated['payment_date'],
        ]);

        return response()->json([
            'message' => 'Payment updated successfully.',
            'payment' => $payment
        ]);
    }


    // DELETE /delete-payment/{id}
    public function deletePayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return response()->json([
            'message' => 'Payment deleted successfully.'
        ]);
    }
}
