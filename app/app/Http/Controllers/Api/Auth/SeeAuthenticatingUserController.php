<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeeAuthenticatingUserController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = auth()->attempt();
        return response()->success($user);
    }
}
