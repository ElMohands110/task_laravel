<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUserPage() {
        return view('user.addUser');
    }

    public function storeUser(Request $request) {

        // validation
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // get request
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($user)
            return response()->json([
                'status' => true,
                'message' => 'Successfully Created',
            ]);
        else
            return response()->json([
                'status' => false,
                'message' => 'Failed Created, Please Try Again',
            ]);
    }

    public function getUsers() {
        $users = User::get();
        return view('user.allUsers')->with('users', $users);
    }
}
