<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
class UserAuthController extends Controller
{
    function login(Request $Request){
        $user = User::where('email',$Request->email)->first();
        if (!$user || !Hash::check($Request->password,$user->password)) {
         return ["result"=>"User not found","Success"=>false];   
        }else{
            $success['token'] = $user->createToken('Myapp')->plainTextToken;
            $user['name'] = $user->name;
            return ["result"=>$success,"msg"=>"user login successfully"];
        }
    }

 
public function signup(Request $request)
{
    // Validate incoming request
    try {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json(['error' => 'Validation failed', 'message' => $e->errors()], 422);
    }

    // Prepare the user input data
    $input = $request->all();

    // Hash the password before saving it
    $input['password'] = Hash::make($input['password']);

    try {
        // Create the user
        $user = User::create($input);

        // Check if user creation failed
        if (!$user) {
            return response()->json(['error' => 'User creation failed'], 500);
        }

        // Log user data to ensure it's correct
        Log::info('User created successfully:', ['user' => $user]);

        // Attempt to create a token for the user
        $token = $user->createToken('MyApp')->plainTextToken;

        // Check if token creation failed
        if (!$token) {
            return response()->json(['error' => 'Token creation failed'], 500);
        }

        // Log the generated token for debugging
        Log::info('Generated token:', ['token' => $token]);

        // Prepare the success response
        $success['token'] = $token;
        $success['user'] = $user;

        return response()->json([
            'success' => true,
            'result' => $success,
            'msg' => 'User registered successfully',
        ]);

    } catch (Exception $e) {
        // Log the exception message for debugging
        Log::error('Error during signup process: ' . $e->getMessage());
        return response()->json(['error' => 'Signup failed', 'message' => $e->getMessage()], 500);
    }
}

}
