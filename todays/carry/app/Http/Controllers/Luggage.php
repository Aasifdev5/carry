<?php

namespace App\Http\Controllers;

use App\Models\LuggageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;
use App\Models\PersonalAccess;

class Luggage extends Controller
{
    public function luggages(Request $request)
    {
        $luggage = DB::table('luggage')->get();
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('luggages', compact('data'), ['luggage' => $luggage]);
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function add_luggage(Request $request)
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('add_luggage', compact('data'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function save_luggage_type(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $luggage = new LuggageType();
            $request->validate([
                'luggage_name' => 'required',

            ]);
            $luggage->luggage_name = $request->luggage_name;
            $response = $luggage->save();
            if ($response) {
                return redirect('luggages')->with('success', 'Successfully Added');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
    public function delete_luggage_type(Request $request)
    {
        $luggage = LuggageType::find($request->id);
        $luggage->delete();
        return back()->with('success', 'Successfully Deleted Record');
        // $vehicle = vehicle::where('id', $request->id)->delete();

    }
    public function edit_luggage_type(Request $request)
    {
        $luggage = LuggageType::find($request->id);

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('edit_luggage_type', compact('data'), ['luggage' => $luggage]);
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
    public function update_luggage_type(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $request->validate([
                'luggage_name' => 'required',

            ]);
            $luggage = LuggageType::where('id', '=', $request->luggage_id)->first();
            $luggage->luggage_name = $request->luggage_name;

            $luggage->update();
            if ($luggage) {
                return redirect('luggages')->with('success', 'Successfully Updated');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
}