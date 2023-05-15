<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Language;
use Illuminate\Support\Facades\App;
use App\Models\PersonalAccess;

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
                $personal = new PersonalAccess();
                $session = $request->session()->all();
                $request->Session()->put('loginId', $customer->id);
                $request->Session()->put('token', $session['_token']);
                $data = Customers::where('id', '=', $customer->id)->first();

                $personal->tokenable_type = "App\Models\Customers";
                $personal->tokenable_id = $customer->id;
                $personal->name = $data->name;
                $personal->token = $session['_token'];
                $personal->save();


                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password does not matches');
            }
        } else {
            return back()->with("fail", "Email is not register");
        }
    }

    public function dashboard(Request $request)
    {
        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        if (!empty($check)) {
            return view('dashboard', compact('data'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
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
    public function push_notice(Request $request)
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('push_notice', compact('data'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function users_list(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('users', compact('data'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function add_user(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('add_user', compact('data'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
    public function change_password(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('change_password', compact('data'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
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
    public function profile(Request $request)
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }

        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('profile', compact('data'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        if (Session::has('loginId')) {
            $token = Session::get('token');
            $personal = new PersonalAccess();
            $personal->where('token', $token)->delete();
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
}
