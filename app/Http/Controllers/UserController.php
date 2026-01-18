<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;

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

}
