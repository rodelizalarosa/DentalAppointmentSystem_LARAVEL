<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DentalService;

class DentalServiceController extends Controller
{
   // Get all dental services
    public function getDentalServices()
    {
        $services = DentalService::all();
        return response()->json(['services' => $services]);
    }

    // Add a new dental service
    public function addDentalService(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:dental_services,name'],
            'cost' => ['required', 'numeric', 'min:0'],
        ]);

        $service = DentalService::create([
            'name' => $request->name,
            'cost' => $request->cost,
        ]);

        return response()->json(['message' => 'Dental service added successfully', 'service' => $service]);
    }

    // Update dental service
    public function editDentalService(Request $request, $id)
    {
        $service = DentalService::find($id);

        if (!$service) {
            return response()->json(['message' => 'Dental service not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:dental_services,name,' . $service->id,
            'cost' => 'required|numeric|min:0',
        ]);

        $service->update([
            'name' => $request->name,
            'cost' => $request->cost,
        ]);

        return response()->json(['message' => 'Dental service updated successfully', 'service' => $service]);
    }

    // Delete dental service
    public function deleteDentalService($id)
    {
        $service = DentalService::find($id);

        if (!$service) {
            return response()->json(['message' => 'Dental service not found'], 404);
        }

        $service->delete();

        return response()->json(['message' => 'Dental service deleted successfully']);
    }
}
