<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User;

        $user->name =  $request->name;
        $user->password = $request->password;
        $user->account_bank_number = $request->account_bank_number;
        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();

        return response()->json([
            "message" => "User saved succesful",
            "user_id" => $user->id
        ], 201);
    }

    public function getById(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                "message" => "Don't find the user"
            ], 400);
        }

        return $user;
    }

    public function deleteById(string $id)
    {

        $user = User::find($id);

        if (!$user) {
            return response()->json([
                "message" => "User doesn't found to delete"
            ], 404);
        }

        $user->delete()->onCascade();
        return response()->json([
            "message" => "User deleted succesful"
        ], 200);
    }

    public function updateById(Request $request, string $id)
    {

        $user = User::find($id);

        if (!$user) {
            return response()->json([
                "message" => "User doesn't founded"
            ], 404);
        }

        $user->name = $request->name;

        if ($request->password != "") {
            $user->password = $request->password;
        }

        $user->account_bank_number = $request->account_bank_number;

        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();
        return response()->json([
            "message" => "User data updated!!"
        ], 204);
    }

    public function show()
    {
        return User::all();
    }
}
