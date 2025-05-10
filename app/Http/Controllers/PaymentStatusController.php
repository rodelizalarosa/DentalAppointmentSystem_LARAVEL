<?php

namespace App\Http\Controllers;
use App\Models\PaymentStatus;

use Illuminate\Http\Request;

class PaymentStatusController extends Controller
{
    // GET /get-paymentStatuses
    public function getPaymentStatuses()
    {
        $statuses = PaymentStatus::all();
        return response()->json($statuses);
    }

    // POST /add-paymentStatus
    public function addPaymentStatus(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:payment_statuses,name',
        ]);

        $status = PaymentStatus::create($validated);

        return response()->json([
            'message' => 'Payment status created successfully.',
            'status' => $status
        ]);
    }

    // PUT /edit-paymentStatus/{id}
    public function editPaymentStatus(Request $request, $id)
    {
        $status = PaymentStatus::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|unique:payment_statuses,name,' . $status->id,
        ]);

        $status->update($validated);

        return response()->json([
            'message' => 'Payment status updated successfully.',
            'status' => $status
        ]);
    }

    // DELETE /delete-paymentStatus/{id}
    public function deletePaymentStatus($id)
    {
        $status = PaymentStatus::findOrFail($id);
        $status->delete();

        return response()->json([
            'message' => 'Payment status deleted successfully.'
        ]);
    }
}
