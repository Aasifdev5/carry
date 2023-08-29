<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;
use App\Models\PersonalAccess;

class Languages extends Controller
{
    public function language(Request $request)
    {
        $language = DB::table('languages')->get();
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('language', compact('data'), ['language' => $language]);
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
    public function add_language(Request $request)
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('add_language', compact('data'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function save_language(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $language = new Language();
            $request->validate([
                'language_name' => 'required',
                'language_code' => 'required',
                'language_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]);
            $language->name = $request->language_name;

            $language->language_photo = $request->file('language_photo')->getClientOriginalName();

            $image = $request->file('language_photo')->getClientOriginalName();
            $request->language_photo->move('images/language', $image);
            $language->code = $request->language_code;
            $response = $language->save();

            if ($response) {
                return redirect('language')->with('success', 'Successfully Added');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
    public function delete_language(Request $request)
    {
        $language = Language::find($request->id);
        $language->delete();
        return back()->with('success', 'Successfully Deleted Record');
        // $vehicle = vehicle::where('id', $request->id)->delete();

    }
    public function edit_language(Request $request)
    {
        $language = Language::find($request->id);

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('edit_language', compact('data'), ['language' => $language]);
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
    public function update_language(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $request->validate([
                'language_name' => 'required',
                'language_code' => 'required',
                'language_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]);
            $language = Language::where('id', '=', $request->language_id)->first();
            $language->name = $request->language_name;
            $language->code = $request->language_code;
            if (!empty($request->language_photo)) {
                $language->language_photo = $request->file('language_photo')->getClientOriginalName();

                $image = $request->file('language_photo')->getClientOriginalName();
                $request->language_photo->move('images/language', $image);
            }


            $language->update();
            if ($language) {
                return redirect('language')->with('success', 'Successfully Updated');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
}
