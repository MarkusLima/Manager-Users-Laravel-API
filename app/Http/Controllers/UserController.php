<?php

namespace App\Http\Controllers;

use App\model\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function findUser($id)
    {
        $user = User::with('address', 'permissionUser')->find($id);
        return response()->json(['user' => $user], 200);
    }

    public function showUser(Request $request)
    {
        $user = User::with('address', 'permissionUser')->find($request->user()->id);
        return response()->json(['users' => $user], 200);
    }

    public function showAllUser()
    {
        $user = User::with('address', 'permissionUser')->get();
        return response()->json(['user' => $user], 200);
    }

    public function updateUser(Request $request, $id)
    {
        $response = User::updateUser($request->all(), $id);

        if ($response['success'] == 'true') {
            return response()->json($response, 200);
        } else {
            return response()->json($response);
        }
    }

    public function deleteUSer($id)
    {
        User::whereId($id)->delete();
        return response()->json(['msg' => 'delete successfully!']);
    }

    public function createUserAddress(Request $request, $user_id)
    {
        $response = User::createUserAddress($request->all(), $user_id);

        if ($response['success'] == 'true') {
            return response()->json($response, 200);
        } else {
            return response()->json($response);
        }
    }
}
