<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;
use App\Models\Premium;
use App\Models\Currencies;
use Illuminate\Support\Facades\DB;

class PremiumPlan extends Controller
{
    public function premium_plan(Request $request)
    {
        $premium = DB::table('premium')->get();
        $curreny = DB::table('currency')->get();
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('premium_plan', compact('data'), ['premium' => $premium, 'currency' => $curreny]);
    }

    public function add_plan(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('add_plan', compact('data'));
    }

    public function save_plan(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $premium = new Premium();
            $request->validate([
                'plan_name' => 'required',
                'currency' => 'required',
                'price' => 'required',
                'price_invite_code' => 'required',
                'duration' => 'required'
            ]);
            $premium->premium_plan = $request->plan_name;
            $premium->currency = $request->currency;
            $premium->price = $request->price;
            $premium->price_invite_code = $request->price_invite_code;
            $premium->duration = $request->duration;
            $response = $premium->save();
            if ($response) {
                return redirect('premium_plan')->with('success', 'Successfully Added');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
    public function delete_plan(Request $request)
    {
        $premium = Premium::find($request->id);
        $premium->delete();
        return back()->with('success', 'Successfully Deleted Record');
        // $vehicle = vehicle::where('id', $request->id)->delete();

    }
    public function edit_plan(Request $request)
    {
        $premium = Premium::find($request->id);

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('edit_plan', compact('data'), ['premium' => $premium]);
    }
    public function update_plan(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $request->validate([
                'plan_name' => 'required',
                'currency' => 'required',
                'price' => 'required',
                'price_invite_code' => 'required',
                'duration' => 'required'
            ]);
            $premium = Premium::where('id', '=', $request->premium_id)->first();
            $premium->premium_plan = $request->plan_name;
            $premium->currency = $request->currency;
            $premium->price = $request->price;
            $premium->price_invite_code = $request->price_invite_code;
            $premium->duration = $request->duration;
            $premium->update();
            if ($premium) {
                return redirect('premium_plan')->with('success', 'Successfully Updated');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
}
