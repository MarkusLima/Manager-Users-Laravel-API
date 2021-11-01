<?php

namespace App\Http\Controllers;

use App\model\Permission;
use App\model\PermissionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PermissionController extends Controller
{
    public function showPermission(Request $request)
    {
        $user = PermissionUser::with('permission')->where('user_id', $request->user()->id)->get();
        return response()->json(['permission' => $user], 200);
    }

    public function showAllPermission()
    {
        $user = Permission::with('permissionUser')->get();
        return response()->json(['permission' => $user], 200);
    }

    public function createPermission(Request $request)
    {
        $response = Permission::createPermission($request->all());

        if ($response['success'] == 'true') {
            return response()->json($response, 200);
        } else {
            return response()->json($response);
        }
    }

    public function updatePermission(Request $request, $id)
    {
        $response = Permission::updatePermission($request->all(), $id);

        if ($response['success'] == 'true') {
            return response()->json($response, 200);
        } else {
            return response()->json($response);
        }
    }

    public function deletePermission($id)
    {
        Permission::whereId($id)->delete();
        return response()->json(['msg' => 'delete successfully!']);
    }

    public function findPermission($id)
    {
        return response()->json(['entity' => Permission::find($id)]);
    }

    public function createPermissionUser(Request $request, $user_id)
    {
        $response = PermissionUser::createPermissionUser($request->all(), $user_id);

        if ($response['success'] == 'true') {
            return response()->json($response, 200);
        } else {
            return response()->json($response);
        }
    }

    public function deletePermissionUser($id)
    {
        PermissionUser::whereId($id)->delete();
        return response()->json(['msg' => 'delete successfully!']);
    }

}
