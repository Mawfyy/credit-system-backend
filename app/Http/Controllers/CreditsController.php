<?php

namespace App\Http\Controllers;

use App\Models\Credits;
use Illuminate\Http\Request;

class CreditsController extends Controller
{
    public function store(Request $request)
    {
        $credit = new Credits;

        $credit->request_credit_id = $request->request_credit_id;
        $credit->user_id = $request->user_id;
        $credit->account_number = $request->account_number;
        $credit->type = $request->type;
        $credit->quantity_fax = $request->quantity_fax;
        $credit->value = $request->value;
        $credit->fax_value = $request->fax_value;

        $credit->save();
    }


    public function getByUserId(string $id)
    {
        $credits = Credits::where('user_id', $id)->get();
        return $credits;
    }
}
