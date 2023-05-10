<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Language;
use Illuminate\Support\Facades\App;

class User extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('register');
    }

    public function registeration(Request $request)
    {

        $customer = new Customers();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required'
        ]);

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = FacadesHash::make($request->password);
        $response = $customer->save();
        if ($response) {
            return back()->with('success', 'Successfully register');
        } else {
            return back()->with('fail', 'Something wrong');
        }
    }
    public function customer_login(Request $request)
    {
        $customer = new Customers();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $customer = Customers::where('email', '=', $request->email)->first();
        if ($customer) {
            if (FacadesHash::check($request->password, $customer->password)) {
                $request->Session()->put('loginId', $customer->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password does not matches');
            }
        } else {
            return back()->with("fail", "Email is not register");
        }
    }

    public function dashboard()
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('dashboard', compact('data'));
    }
    public function lang_change(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        App::setLocale($request->lang);
        session()->put('lang_code', $request->lang);
        return redirect()->back();
    }
    public function push_notice()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('push_notice', compact('data'));
    }

    public function users_list()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('users', compact('data'));
    }

    public function add_user()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('add_user', compact('data'));
    }
    public function change_password()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('change_password', compact('data'));
    }

    public function update_password(Request $request)
    {

        $customer = new Customers();
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => ['same:new_password']
        ]);

        $data = Customers::find(Session::get('loginId'));
        // $data = Customers::where('id', '=', Session::get('loginId'))->first();
        if (!FacadesHash::check($request->old_password, $data->password)) {
            return back()->with("fail", "Old Password Doesn't match!");
        }
        #Update the new Password
        $data = Customers::where('id', '=', $data->id)->update([
            'password' => FacadesHash::make($request->new_password)

        ]);
        return redirect('dashboard')->with('success', 'Successfully Updated');
    }
    public function profile()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('profile', compact('data'));
    }

    public function logout(Request $request)
    {
        if (Session::has('loginId')) {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
}
