<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
        // GET /api/users
    public function index():JsonResponse
    {
        return response()->json([
            'users' => [
                ['id' => 1, 'name' => 'John'],
                ['id' => 2, 'name' => 'Alice'],
            ]
        ]);
    }
/**
 * @param \Illuminate\Http\Request $request
 */
    public function me(Request $request): JsonResponse
{
    // Return the authenticated user
    return response()->json([
        'user' => $request->user(),
    ]);
}
}