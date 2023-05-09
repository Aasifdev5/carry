<?php

namespace App\Http\Controllers;

use App\Models\PaymentSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;

class PaymentInterface extends Controller
{
    public function api_keys(Request $request)
    {
        $apis = DB::table('apis')->get();
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('apis', compact('data'), ['apis' => $apis]);
    }
    public function add_api(Request $request)
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('add_api', compact('data'));
    }
    public function save_api_key(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $api = new PaymentSetting();
            $request->validate([
                'api_name' => 'required',
                'api_key' => 'required'

            ]);
            $api->api_name = $request->api_name;
            $api->api_key = $request->api_key;

            $response = $api->save();
            if ($response) {
                return redirect('api_keys')->with('success', 'Successfully Added');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }

    public function delete_api(Request $request)
    {
        $api = PaymentSetting::find($request->id);
        $api->delete();
        return back()->with('success', 'Successfully Deleted Record');
        // $vehicle = vehicle::where('id', $request->id)->delete();

    }
    public function edit_api(Request $request)
    {
        $api = PaymentSetting::find($request->id);

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('edit_api', compact('data'), ['api' => $api]);
    }
    public function update_api_key(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $request->validate([
                'api_name' => 'required',
                'api_key' => 'required'

            ]);
            $api = PaymentSetting::where('id', '=', $request->api_id)->first();
            $api->api_name = $request->api_name;
            $api->api_key = $request->api_key;

            $api->update();
            if ($api) {
                return redirect('api_keys')->with('success', 'Successfully Updated');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
}
