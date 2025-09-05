<?php

namespace App\Rest\Controllers;

use App\Models\User;
use App\Rest\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<\Lomkit\Rest\Http\Resource>
     */
    public static $resource = \App\Rest\Resources\AuthUserResource::class;



    public function logout(Request $request):JsonResponse
    {
        $request->user()->tokens()->delete();
        return response()->json(['message'=>'Logged out'],200);
    }
}
