<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use App\Models\PersonalAccess;

class Distributor extends Controller
{
    public function distributor_management(Request $request)
    {
        $distributors = DB::table('customers')->get();
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('distributors', compact('data'), ['distributors' => $distributors]);
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
    public function add_distributor(Request $request)
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('add_distributor', compact('data'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function save_distributor(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $customer = new Customers();
            $request->validate([
                'distributor_name' => 'required',
                'distributor_invite_code' => 'required',
                'distributor_start_date' => 'required',
                'distributor_end_date' => 'required',
                'email' => 'required|email|unique:customers',
                'password' => 'required',
                'confirm_password' => ['same:password']
            ]);


            $customer->distributor_name = $request->distributor_name;
            $customer->invite_code = $request->distributor_invite_code;
            $customer->start_date = $request->distributor_start_date;
            $customer->end_date = $request->distributor_end_date;
            $customer->name = $request->distributor_name;
            $customer->email = $request->email;
            $customer->password = FacadesHash::make($request->password);
            $response = $customer->save();
            if ($response) {
                return redirect('distributor_management')->with('success', 'Successfully Added');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
}
