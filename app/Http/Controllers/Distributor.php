<?php

namespace App\Http\Controllers;

use App\Models\Distributors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;

class Distributor extends Controller
{
    public function distributor_management(Request $request)
    {
        $distributors = DB::table('distributors')->get();
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('distributors', compact('data'), ['distributors' => $distributors]);
    }
    public function add_distributor(Request $request)
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('add_distributor', compact('data'));
    }

    public function save_distributor(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $distributor = new Distributors();

            $request->validate([
                'distributor_name' => 'required',
                'distributor_invite_code' => 'required',
                'distributor_start_date' => 'required',
                'distributor_end_date' => 'required',
                'distributor_email' => 'required|email|unique:customers',
                // 'email' => 'required|email|unique:customers',
                'password' => 'required',
                'confirm_password' => ['same:password']
            ]);
            $customer = new Customers();

            $distributor->distributor_name = $request->distributor_name;
            $distributor->invite_code = $request->distributor_invite_code;
            $distributor->start_date = $request->distributor_start_date;
            $distributor->end_date = $request->distributor_end_date;
            $distributor->distributor_email = $request->distributor_email;
            $distributor->password = $request->password;
            $customer->name = $request->distributor_name;
            $customer->email = $request->distributor_email;
            $customer->password = FacadesHash::make($request->password);
            $customer->save();
            $response = $distributor->save();
            if ($response) {
                return redirect('distributor_management')->with('success', 'Successfully Added');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
}
