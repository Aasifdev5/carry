<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Contracts\Mail;
use App\Models\users;
use App\Models\Currencies;
use App\Models\Language;
use App\Models\LuggageType;
use App\Models\Vehicle;
use App\Models\Premium;
use Illuminate\Support\Facades\File;
use App\Models\Terms;
use App\Models\PersonalAccess;
use App\Models\PushNotification;
use App\Models\Customers;

class APIController extends Controller
{
    public function sign_in(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'

        ]);

        if ($validator->fails()) {
            $output['response'] = false;
            $output['message'] = $validator->errors();
        } else {
            $input = $request->all();
            $v = $input['password'];
            $output['response'] = true;
            $var = DB::table('customers')->where('email', $input['email'])->first();

            if (Hash::check($v, $var->password) || $v == $var->password) {

                $output['response'] = true;

                $output['message'] = "LoggedIn  SuccessfullY";
                $output['data'] = $var;
                header('Content-Type: application/json');
                print_r(json_encode($output));
            } else {
                $output['response'] = false;
                $output['message'] = 'Invalid';
                print_r(json_encode($output));
            }
        }
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            $output['response'] = false;
            $output['message'] = $validator->errors();
        } else {
            $customer = new users();
            $output['response'] = true;
            $input = $request->all();
            $response = users::create($input);
            if ($response) {

                $output['response'] = true;
                $output['message'] = "Register  SuccessfullY";
                $output['data'] = $response;
                header('Content-Type: application/json');
                print_r(json_encode($output));
            } else {
                $output['response'] = false;
                $output['message'] = 'Invalid';
                print_r(json_encode($output));
            }
        }
    }
    public function deletedata(Request $request)
    {
        $id = $request->id;
        $data = DB::table('users')
            ->where('id', $id)
            ->delete();

        $output['response'] = true;
        $output['message'] = 'Data deleted SuccessfullY';
        // $output['data']=$c1;

        header('Content-Type: application/json');
        print_r(json_encode($output));
    }
    public function deleteclient(Request $request, $id)
    {
        $data = users::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Data deleted successfully');
    }

    public function languages()
    {
        return Language::all();
    }

    public function currency()
    {
        return Currencies::all();
    }
    public function luggage()
    {
        return LuggageType::all();
    }
    public function vehicle()
    {
        return Vehicle::all();
    }

    public function premium_plan()
    {
        return Premium::all();
    }

    public function user_terms()
    {
        return Terms::all();
    }
    public function logout(Request $request)
    {

        $token = Session::get('token');
        $personal = new PersonalAccess();

        $personal->each(function ($token, $key) {
            $token->delete();
        });
        session()->flush();
        return response()->json([
            'message' => 'Logged out successfully!',
            'status_code' => 200
        ], 200);
    }
    public function multilanguage(Request $request)
    {
        $code = $request->code;
        $jsonString = [];
        if (File::exists(base_path('resources/lang/' . $code . '.json'))) {
            $jsonString = file_get_contents(base_path('resources/lang/' . $code . '.json'));
            $jsonString = json_decode($jsonString, true);
        }

        return $jsonString;
    }

    public function push_notification()
    {
        return PushNotification::all();
    }

    public function change_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => ['same:new_password']
        ]);

        if ($validator->fails()) {
            $output['response'] = false;
            $output['message'] = $validator->errors();
        } else {
            $output['response'] = true;
            $data = Customers::find('3');
            if (!FacadesHash::check($request->old_password, $data->password)) {
                $output['response'] = false;
                $output['message'] = 'Old Password Does not match!';
                return json_encode($output);
            } elseif (FacadesHash::check($request->new_password, $data->password)) {
                $output['response'] = false;
                $output['message'] = 'Please enter a password which is not similar then current password!';
                return json_encode($output);
            } else {
                #Update the new Password
                $data = Customers::where('id', '=', $data->id)->update([
                    'password' => FacadesHash::make($request->new_password)

                ]);
                $output['response'] = true;

                $output['message'] = "Password Changed SuccessfullY";

                header('Content-Type: application/json');
                return json_encode($output);
            }
        }
    }

    public function forgotPassword(Request $request)
    {
    }
}
