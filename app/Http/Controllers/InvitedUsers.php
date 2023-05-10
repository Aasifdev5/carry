<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;

class InvitedUsers extends Controller
{
    public function invited_users(Request $request)
    {
        $customers = DB::table('customers')->get();
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('invited_users', compact('data'), ['customers' => $customers]);
    }
}
