<?php

// Authentication register, login, logout

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // register() - create user + token
			public function register(Request $request): JsonResponse
			{
				$validated = $request->validate([
					'name' => ['required', 'string', 'max:255'],
					'email' => ['required', 'email', 'unique:users,email'],
					'password' => ['required', 'string', 'min:8', 'confirmed'],
				]);

				$user = User::create([
					'name' => $validated['name'],
					'email' => $validated['email'],
					'password' => Hash::make($validated['password']),
				]);

				$token = $user->createToken('auth-token')->plainTextToken;

				return response()->json([
					'message' => 'Registration successful',
					'user' => [
						'id' => $user->id,
						'name' => $user->name,
						'email' => $user->email,
					],
					'token' => $token,
				], 201);
			}
}
