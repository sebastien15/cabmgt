<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class authController extends Controller
{
    // get all users

    public function getUsers()
    {
        $users = User::all();

        return response()->json([
            $users
        ]);
    }

    //register a user 

    public function register(Request $request)
    {
        $user = new User;
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->isAdmin = $request->isAdmin;
        $user->isOperator = $request->isOperator;
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json([
            $user
        ]);
    }

    // get a single user

    public function getUser($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
    
            return response()->json([
              $user
            ], 202);
        } else {
            return response()->json([
              "message" => "user not found"
            ], 404);
        }
    }

    // get a update user

    public function updateUser(Request $request, $id)
    {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->email = is_null($request->email) ? $user->email : $request->email;
 
            $user->save();
 
            return response()->json([
                "message" => "user updated successfully",
                $user
            ], 200);
        } else{
            return response()->json([
                "message" => "user not found"
            ], 404);
        };

    }

    // delete a user

    public function deleteUser($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();
    
            return response()->json([
              "message" => "user deleted"
            ], 202);
        } else {
            return response()->json([
              "message" => "user not found"
            ], 404);
        }
    }

    //login a user

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return response()->json([
            Auth::attempt($credentials)
          ], 200);
        exit();
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // return redirect()->intended('dashboard');
            return response()->json([
                "message"=> "well authenticated"
            ], 202);
        } else{
            return response()->json([
                "message" => "user not found"
              ], 404);
        }
    }

    //logout a user

    public function logout()
    {
        Auth::logout();
    }
}
