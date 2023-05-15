<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Session;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use App\Models\PersonalAccess;

class VehicleController extends Controller
{
    public function vehicle_list(Request $request)
    {
        $vehicles = DB::table('vehicles')->get();
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('vehicle_list', compact('data'), ['vehicles' => $vehicles]);
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function add_vehicle(Request $request)
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('add_vehicle', compact('data'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
    public function delete_vehicle(Request $request)
    {
        $vehicle = vehicle::find($request->id);
        $vehicle->delete();
        return back()->with('success', 'Successfully Deleted Record');
        // $vehicle = vehicle::where('id', $request->id)->delete();

    }
    public function edit_vehicle(Request $request)
    {
        $vehicle = vehicle::find($request->id);

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('edit_vehicle', compact('data'), ['vehicle' => $vehicle]);
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
    public function update_vehicle(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $request->validate([
                'vehicle_name' => 'required',
                'vehicle_photo_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required'
            ]);
            $vehicle = vehicle::where('id', '=', $request->vehicle_id)->first();
            $vehicle->vehicle_name = $request->vehicle_name;
            if (!empty($request->vehicle_photo_name)) {
                $vehicle->vehicle_photo_name = $request->file('vehicle_photo_name')->getClientOriginalName();
                $image = $request->file('vehicle_photo_name')->getClientOriginalName();
                $request->vehicle_photo_name->move(public_path('images/vehicles'), $image);
            }

            $vehicle->description = $request->description;
            $vehicle->update();
            if ($vehicle) {
                return redirect('vehicle_list')->with('success', 'Successfully Updated');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
    public function save_vehicle(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $vehicle = new Vehicle();
            $request->validate([
                'vehicle_name' => 'required',
                'vehicle_photo_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required'
            ]);
            $vehicle->vehicle_name = $request->vehicle_name;
            $vehicle->vehicle_photo_name = $request->file('vehicle_photo_name')->getClientOriginalName();

            $image = $request->file('vehicle_photo_name')->getClientOriginalName();
            $request->vehicle_photo_name->move(public_path('images/vehicles'), $image);
            $vehicle->description = $request->description;
            $response = $vehicle->save();
            if ($response) {
                return redirect('vehicle_list')->with('success', 'Successfully Added');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
}
