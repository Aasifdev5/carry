<?php

namespace App\Http\Controllers;

use App\Models\UserLimitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;

use Illuminate\Support\Facades\DB;

class Limitation extends Controller
{
    public function limitation(Request $request)
    {
        $user_limitation = DB::table('user_limitation')->get();
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('limitation', compact('data'), ['user_limitation' => $user_limitation]);
    }

    public function add_limit(Request $request)
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('add_limit', compact('data'));
    }

    public function save_limit(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $user_limitation = new UserLimitation();
            $request->validate([
                'swipe_limit' => 'required',
                'add_offer_limit' => 'required',
                'chat_limit' => 'required',

            ]);
            $user_limitation->chat_limit = $request->chat_limit;
            $user_limitation->swipe_limit = $request->swipe_limit;
            $user_limitation->add_offer_limit = $request->add_offer_limit;

            $response = $user_limitation->save();

            if ($response) {
                return redirect('limitation')->with('success', 'Successfully Added');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
    public function delete_limit(Request $request)
    {
        $user_limitation = UserLimitation::find($request->id);
        $user_limitation->delete();
        return back()->with('success', 'Successfully Deleted Record');
        // $vehicle = vehicle::where('id', $request->id)->delete();

    }
    public function edit_limit(Request $request)
    {
        $user_limitation = UserLimitation::find($request->id);

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('edit_limit', compact('data'), ['user_limitation' => $user_limitation]);
    }
    public function update_limit(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $request->validate([
                'swipe_limit' => 'required',
                'add_offer_limit' => 'required',
                'chat_limit' => 'required',

            ]);
            $user_limitation = UserLimitation::where('id', '=', $request->user_limitation_id)->first();

            $user_limitation->chat_limit = $request->chat_limit;
            $user_limitation->swipe_limit = $request->swipe_limit;
            $user_limitation->add_offer_limit = $request->add_offer_limit;

            $user_limitation->update();
            if ($user_limitation) {
                return redirect('limitation')->with('success', 'Successfully Updated');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
}
