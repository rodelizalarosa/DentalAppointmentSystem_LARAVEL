<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

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
            'appointment_service_id' => 'required|exists:appointment_services,id',
            'payment_status_id' => 'required|exists:payment_statuses,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
        ]);

        $payment = Payment::create($validated);

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
            'appointment_service_id' => 'required|exists:appointment_services,id',
            'payment_status_id' => 'required|exists:payment_statuses,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
        ]);

        $payment->update($validated);

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
