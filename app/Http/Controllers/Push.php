<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\PersonalAccess;
use Illuminate\Support\Facades\Session;
use App\Models\PushNotification;

class Push extends Controller
{
    public function push_notice(Request $request)
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        $push_notification = PushNotification::all();
        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('push_notice', compact('data', 'push_notification'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function add_push_notification(Request $request)
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('add_push_notification', compact('data'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function save_push_notification(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $push_notification = new PushNotification();
            $request->validate([
                'user_type' => 'required',
                'message' => 'required'

            ]);
            $push_notification->user_type = $request->user_type;
            $push_notification->message = $request->message;
            $response = $push_notification->save();
            if ($response) {
                return redirect('push_notice')->with('success', 'Successfully Added');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
    public function delete_push_notification(Request $request)
    {
        $push_notification = PushNotification::find($request->id);
        $push_notification->delete();
        return back()->with('success', 'Successfully Deleted Record');
    }
    public function edit_push_notification(Request $request)
    {
        $push_notification = PushNotification::find($request->id);

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('edit_push_notification', compact('data'), ['push_notification' => $push_notification]);
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
    public function update_push_notification(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $request->validate([
                'user_type' => 'required',
                'message' => 'required'

            ]);

            $push_notification = PushNotification::where('id', '=', $request->notification_id)->first();
            $push_notification->user_type = $request->user_type;
            $push_notification->message = $request->message;

            $push_notification->update();
            if ($push_notification) {
                return redirect('push_notice')->with('success', 'Successfully Updated');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
}
