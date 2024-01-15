<?php

namespace App\Http\Controllers;

use App\Models\RequestCredits;
use Illuminate\Http\Request;

class RequestCreditsController extends Controller
{
    public function show()
    {
        return RequestCredits::all();
    }

    public function getById(string $id)
    {
        $request_credit = RequestCredits::where('user_id', $id)->get();

        if (!$request_credit) {
            return response()->json([
                "message" => "Request doesn't founded",
            ], 400);
        }

        return $request_credit;
    }

    public function updateById(Request $request, string $id)
    {
        $request_credit = RequestCredits::find($id);

        $request_credit->state = $request->state;
        $request_credit->remarks_adviser = $request->remarks_adviser;

        $request_credit->save();

        if (!$request_credit) {
            return response()->json([
                "message" => "Request credit doesn't updated",
            ], 400);
        }
    }


    public function store(Request $request)
    {
        $request_credit = new RequestCredits;

        $request_credit->description = $request->description;
        $request_credit->state = $request->state;
        $request_credit->value = $request->value;
        $request_credit->type = $request->type;
        $request_credit->user_id = $request->user_id;
        $request_credit->quantity_fax = $request->quantity_fax;
        $request_credit->remarks_adviser = $request->remarks_adviser;

        $request_credit->save();


        return response()->json([
            "message" => "Request credit saved succesful",
        ], 201);
    }


    public function delete(string $id)
    {
        RequestCredits::where('id', $id)->delete();

        return response()->json([
            "message" => "Request delete successful",
        ], 200);
    }
}
