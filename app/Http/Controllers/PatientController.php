<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;

class PatientController extends Controller
{
    // Get all patients with associated user info
    public function getPatients()
    {
        $patients = Patient::with('user')->get();
        return response()->json(['patients' => $patients]);
    }

    // Add a new patient (assumes user is already created)
    public function addPatient(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id', 'unique:patients,user_id'],
            'phone_number' => ['required', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'in:Male,Female'],
        ]);

        $patient = Patient::create([
            'user_id' => $request->user_id,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
        ]);

        return response()->json(['message' => 'Patient added successfully', 'patient' => $patient]);
    }

    // Update patient info
    public function editPatient(Request $request, $id)
    {
        
        $patient = Patient::find($id);

         if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $request->validate([
            'user_id' => 'required|unique:patients,user_id,' . $patient->id,
            'phone_number' => ['required', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'in:Male,Female'],
        ]);


        $patient->update([
            'user_id' => $request->user_id,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
        ]);

        return response()->json(['message' => 'Patient updated successfully', 'patient' => $patient]);
    }

    // Delete a patient
    public function deletePatient($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully']);
    }
}
