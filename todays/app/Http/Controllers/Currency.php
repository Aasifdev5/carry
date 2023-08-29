<?php

namespace App\Http\Controllers;

use App\Models\Customers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Currencies;
use App\Models\PersonalAccess;

class Currency extends Controller
{
    public function currency(Request $request)
    {
        $currency = DB::table('currency')->get();
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('currency', compact('data'), ['currency' => $currency]);
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function add_currency(Request $request)
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('add_currency', compact('data'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function save_currency(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $currency = new Currencies();
            $request->validate([
                'currency_name' => 'required',
                'currency_symbol' => 'required'

            ]);
            $currency->currency_name = $request->currency_name;
            $currency->currency_symbol = $request->currency_symbol;

            $response = $currency->save();
            if ($response) {
                return redirect('currency')->with('success', 'Successfully Added');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }

    public function delete_currency(Request $request)
    {
        $premium = Currencies::find($request->id);
        $premium->delete();
        return back()->with('success', 'Successfully Deleted Record');
        // $vehicle = vehicle::where('id', $request->id)->delete();

    }
    public function edit_currency(Request $request)
    {
        $currency = Currencies::find($request->id);

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('edit_currency', compact('data'), ['currency' => $currency]);
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
    public function update_currency(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $request->validate([
                'currency_name' => 'required',
                'currency_symbol' => 'required'

            ]);
            $currency = Currencies::where('id', '=', $request->currency_id)->first();
            $currency->currency_name = $request->currency_name;
            $currency->currency_symbol = $request->currency_symbol;
            $currency->update();
            if ($currency) {
                return redirect('currency')->with('success', 'Successfully Updated');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
}