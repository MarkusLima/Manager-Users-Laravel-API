<?php

namespace App\Http\Controllers;

use App\model\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function showAllAddress()
    {
        return response()->json(['entity' => Address::all()], 200);
    }

    public function showAddress(Request $request)
    {
        $user = Address::find($request->user()->id);
        return response()->json(['entity' => $user], 200);
    }

    public function createAddress(Request $request)
    {
        $response = Address::createAddress($request->all());

        if ($response['success'] == 'true') {
            return response()->json($response, 200);
        } else {
            return response()->json($response);
        }

    }

    public function updateAddress(Request $request, $id)
    {
        $response = Address::updateAddress($request->all(), $id);

        if ($response['success'] == 'true') {
            return response()->json($response, 200);
        } else {
            return response()->json($response);
        }
    }

    public function deleteAddress($id)
    {
        Address::whereId($id)->delete();
        return response()->json(['msg' => 'delete successfully!']);
    }

    public function findAddress($id)
    {
        return response()->json(['entity'=> Address::find($id)]);
    }
}
