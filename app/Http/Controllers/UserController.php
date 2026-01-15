<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;  

class UserController extends Controller
{
        // GET /api/users
    public function index()
    {
        return response()->json([
            'users' => [
                ['id' => 1, 'name' => 'John'],
                ['id' => 2, 'name' => 'Alice'],
            ]
        ]);
    }

}
