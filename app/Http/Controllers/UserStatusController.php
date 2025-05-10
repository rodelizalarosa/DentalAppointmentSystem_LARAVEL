<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserStatus;

class UserStatusController extends Controller
{
    // GET /get-userStatuses
    public function getUserStatuses()
    {
        $statuses = UserStatus::all();
        return response()->json($statuses);
    }

    // POST /add-userStatus
    public function addUserStatus(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:user_statuses,name',
        ]);

        $status = UserStatus::create($validated);

        return response()->json(['message' => 'User status created successfully.', 'status' => $status]);
    }

    // PUT /edit-userStatus/{id}
    public function editUserStatus(Request $request, $id)
    {
        $status = UserStatus::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|unique:user_statuses,name,' . $status->id,
        ]);

        $status->update($validated);

        return response()->json(['message' => 'User status updated successfully.', 'status' => $status]);
    }

    // DELETE /delete-userStatus/{id}
    public function deleteUserStatus($id)
    {
        $status = UserStatus::findOrFail($id);
        $status->delete();

        return response()->json(['message' => 'User status deleted successfully.']);
    }
}
