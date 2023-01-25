<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers() {
        return User::all();
    }
    
    // public function getUser(Request $request) {
    //     return User::find($request['id']);
    // }

    public function createUser(Request $request) {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }

    public function updateUser(Request $request) {
        return User::find($request['id'])->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
    }

    public function deleteUser(Request $request) {
        return User::destroy($request['id']); // 0 if not; else 1
    }
}
