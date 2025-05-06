<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\OrganizationResource;

class OrganizationController extends Controller
{
    public function index(Request $request)
    {
        // Fetch the authenticated user
        $user = $request->user();

        // Check if the user is authenticated
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Fetch the organizations associated with the user
        $user->load('organizationUsers');
        $user->load([
            'organizationUsers.organization',
            'organizationUsers.roles.role', // ← ここを追加
        ]);

        return new OrganizationResource($user);
    }
}
