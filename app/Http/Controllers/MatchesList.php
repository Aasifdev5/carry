<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;
use App\Models\PersonalAccess;

class MatchesList extends Controller
{
    public function matches(Request $request)
    {
        $matches_list = DB::table('apis')->get();
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('matches_list', compact('data'), ['matches_list' => $matches_list]);
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
}
