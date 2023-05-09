<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;
use Illuminate\Support\Facades\App;

class MultiLingual extends Controller
{
    public function lang(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('lang', compact('data'));
    }

    public function lang_change(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        App::setLocale($request->lang);
        session()->put('lang_code', $request->lang);
        return redirect()->back();
    }
}
