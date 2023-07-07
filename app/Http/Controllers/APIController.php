<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Models\PasswordReset;
use App\Models\users;
use App\Models\Travelver;
use App\Models\SwipAccepted;
use App\Models\Matche;
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
use App\Mail\SendMailreset;

class APIController extends Controller
{
    function search(Request $request)
    {
        $result = Vehicle::where('departure_address', 'LIKE', '%' . $request->departure_address . '%')
            // ->where('destination_address', 'LIKE', '%' . $request->destination_address . '%')
            ->get();
        $statement = "select * from vehicles where departure_address LIKE   '%" . $request->departure_address . "%'   and destination_address LIKE  '%" . $request->destination_address . "%'";
        $query = DB::select($statement);
        if (count($query)) {
            return Response()->json($result);
        } else {
            return response()->json(['Result' => 'No vehicle available for this route'], 404);
        }
    }
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
            $var = DB::table('users')->where('email', $input['email'])->first();

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
            'lang_id' => 'required',
            'workman_id' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'security_date' => 'required',
            'name' => 'required',
            'profile_photo' => 'required',

        ]);

        if ($validator->fails()) {
            $output['response'] = false;
            $output['message'] = $validator->errors();
        } else {

            $output['response'] = true;

            // $image = $request->file('profile_photo')->getClientOriginalName();
            // $image_path = 'images/profile/'.$request->name;
            // $request->profile_photo->move($image_path, $image);
            // $final=$image_path.'/'.$image;
            $response = users::create([
                'lang_id' => $request->lang_id,
                'workman_id' => $request->workman_id,
                'email' => $request->email,
                'password' => FacadesHash::make($request->password),
                'invite_code' => $request->invite_code,
                'remainder' => $request->remainder,
                'security_date' => $request->security_date,
                'name' => $request->name,
                'profile_photo' => $request->profile_photo,
                'type' => $request->type,
            ]);
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

    public function UpdateTravelverData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'passenger_name' => 'required',
            'passenger_mobile_number' => 'required',
            'name_next_kind' => 'required',
            'mobile_number_next_kind' => 'required',
        ]);

        if ($validator->fails()) {
            $output['response'] = false;
            $output['message'] = $validator->errors();
        } else {

            $output['response'] = true;


            $response = Travelver::updateOrCreate([
                'user_id' => $request->user_id,
                'passenger_name' => $request->passenger_name,
                'passenger_mobile_number' => $request->passenger_mobile_number,
                'name_next_kind' => $request->name_next_kind,
                'mobile_number_next_kind' => $request->mobile_number_next_kind,
            ]);
            if ($response) {

                $output['response'] = true;
                $output['message'] = "Updated Travelver Manifest Data";
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
    public function PostVehicle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'ride_type' => 'required',
            // 'luggage_type' => 'required',
            'destination_type' => 'required',
            // 'currency' => 'required',
            // 'departure_address' => 'required',
            // 'description' => 'required',
        ]);

        if ($validator->fails()) {
            $output['response'] = false;
            $output['message'] = $validator->errors();
        } else {


            $output['response'] = true;
            // $image = $request->file('vehicle_photo_name')->getClientOriginalName();
            // $image_path = 'images/vehicles';
            // $request->vehicle_photo_name->move($image_path, $image);
            // $final=$image_path.'/'.$image;
            $response = Vehicle::create([
                'vehicle_photo_name' => $request->vehicle_photo_name,
                'type' => $request->type,
                'driver_photo' => $request->driver_photo,
                'photo_type' => $request->photo_type,
                'nick_name' => $request->nick_name,
                'ride_type' => $request->ride_type,
                'transport_type' => $request->transport_type,
                'cargo_type' => $request->cargo_type,
                'seats' => $request->seats,
                'luggage_type' => $request->luggage_type,
                'destination_type' => $request->destination_type,
                'currency' => $request->currency,
                'departure_address' => $request->departure_address,
                'destination_address' => $request->destination_address,
                'fixed_price' => $request->fixed_price,
                'driver_id' => $request->driver_id,
                'description' => $request->description,
            ]);
            if ($response) {

                $output['response'] = true;
                $output['message'] = "Vehicle Add Successfully";
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
    public function editVehicle(Request $request)
    {

        $result = Vehicle::where('id', $request->id)->get();
        if (count($result)) {
            return Response()->json($result);
        } else {
            return response()->json(['Result' => 'No vehicle'], 404);
        }
    }
    public function editPrice(Request $request)
    {

        $result = SwipAccepted::where('id', $request->id)->get();
        if (count($result)) {
            return Response()->json($result);
        } else {
            return response()->json(['Result' => 'No vehicle'], 404);
        }
    }
    public function UpdateVehicle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'ride_type' => 'required',
            // 'luggage_type' => 'required',
            // 'destination_type' => 'required',
            // 'currency' => 'required',
            // 'departure_address' => 'required',
            // 'description' => 'required',
        ]);

        if ($validator->fails()) {
            $output['response'] = false;
            $output['message'] = $validator->errors();
        } else {


            $output['response'] = true;

            $response = Vehicle::where('id', '=', $request->id)->update([
                'vehicle_photo_name' => $request->vehicle_photo_name,
                'type' => $request->type,
                'driver_photo' => $request->driver_photo,
                'photo_type' => $request->photo_type,
                'nick_name' => $request->nick_name,
                'ride_type' => $request->ride_type,
                'transport_type' => $request->transport_type,
                'cargo_type' => $request->cargo_type,
                'seats' => $request->seats,
                'luggage_type' => $request->luggage_type,
                'destination_type' => $request->destination_type,
                'currency' => $request->currency,
                'departure_address' => $request->departure_address,
                'destination_address' => $request->destination_address,
                'fixed_price' => $request->fixed_price,
                'driver_id' => $request->driver_id,
                'description' => $request->description,
            ]);
            if ($response) {

                $output['response'] = true;
                $output['message'] = "Offer Update Successfully";
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
    public function UpdatePrice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'ride_type' => 'required',
            // 'luggage_type' => 'required',
            // 'destination_type' => 'required',
            // 'currency' => 'required',
            // 'departure_address' => 'required',
            // 'description' => 'required',
        ]);

        if ($validator->fails()) {
            $output['response'] = false;
            $output['message'] = $validator->errors();
        } else {


            $output['response'] = true;

            $response = SwipAccepted::where('id', '=', $request->id)->update([
                'vehicle_photo_name' => $request->vehicle_photo_name,
                'type' => $request->type,
                'driver_photo' => $request->driver_photo,
                'photo_type' => $request->photo_type,
                'nick_name' => $request->nick_name,
                'ride_type' => $request->ride_type,
                'transport_type' => $request->transport_type,
                'cargo_type' => $request->cargo_type,
                'seats' => $request->seats,
                'luggage_type' => $request->luggage_type,
                'destination_type' => $request->destination_type,
                'currency' => $request->currency,
                'departure_address' => $request->departure_address,
                'destination_address' => $request->destination_address,
                'fixed_price' => $request->fixed_price,
                'driver_id' => $request->driver_id,
                'description' => $request->description,
            ]);
            if ($response) {

                $output['response'] = true;
                $output['message'] = "Offer Update Successfully";
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
    public function SwipAccepted(Request $request)
    {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            $output['response'] = false;
            $output['message'] = $validator->errors();
        } else {


            $output['response'] = true;

            $response = SwipAccepted::create([
                'vehicle_photo_name' => $request->vehicle_photo_name,
                'type' => $request->type,
                'driver_photo' => $request->driver_photo,
                'photo_type' => $request->photo_type,
                'nick_name' => $request->nick_name,
                'ride_type' => $request->ride_type,
                'transport_type' => $request->transport_type,
                'cargo_type' => $request->cargo_type,
                'seats' => $request->seats,
                'luggage_type' => $request->luggage_type,
                'destination_type' => $request->destination_type,
                'currency' => $request->currency,
                'departure_address' => $request->departure_address,
                'destination_address' => $request->destination_address,
                'fixed_price' => $request->fixed_price,
                'user_id' => $request->user_id,
                'driver_id' => $request->driver_id,
                'description' => $request->description,
            ]);
            if ($response) {

                $output['response'] = true;
                $output['message'] = "Request Add Successfully";
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
    public function matches(Request $request)
    {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            $output['response'] = false;
            $output['message'] = $validator->errors();
        } else {


            $output['response'] = true;

            $response = Matche::create([
                'vehicle_photo_name' => $request->vehicle_photo_name,
                'type' => $request->type,
                'driver_photo' => $request->driver_photo,
                'photo_type' => $request->photo_type,
                'nick_name' => $request->nick_name,
                'ride_type' => $request->ride_type,
                'transport_type' => $request->transport_type,
                'cargo_type' => $request->cargo_type,
                'seats' => $request->seats,
                'luggage_type' => $request->luggage_type,
                'destination_type' => $request->destination_type,
                'currency' => $request->currency,
                'departure_address' => $request->departure_address,
                'destination_address' => $request->destination_address,
                'fixed_price' => $request->fixed_price,
                'description' => $request->description,
                'user_id' => $request->user_id,
                'driver_id' => $request->driver_id,
                'matches_id' => $request->matches_id,
            ]);
            $data = DB::table('ride_requests')
                ->where('id', $request->matches_id)
                ->delete();
            if ($response) {

                $output['response'] = true;
                $output['message'] = "Request Add Successfully";
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
    public function deleteuser(Request $request)
    {
        $id = $request->user_id;
        $data = DB::table('users')
            ->where('id', $id)
            ->delete();

        $output['response'] = true;
        $output['message'] = 'Account deleted Successfully';


        header('Content-Type: application/json');
        print_r(json_encode($output));
    }

    public function deleteRequest(Request $request)
    {
        $id = $request->id;
        $data = DB::table('ride_requests')
            ->where('id', $id)
            ->delete();

        $output['response'] = true;
        $output['message'] = 'Request deleted Successfully';


        header('Content-Type: application/json');
        print_r(json_encode($output));
    }

    public function deleteMatches(Request $request)
    {
        $id = $request->id;
        $data = DB::table('matches_request')
            ->where('id', $id)
            ->delete();

        $output['response'] = true;
        $output['message'] = 'Matches deleted Successfully';


        header('Content-Type: application/json');
        print_r(json_encode($output));
    }

    public function deleteVehicle(Request $request)
    {
        $id = $request->id;
        $data = DB::table('vehicles')
            ->where('id', $id)
            ->delete();

        $output['response'] = true;
        $output['message'] = 'Offer deleted Successfully';


        header('Content-Type: application/json');
        print_r(json_encode($output));
    }

    public function languages()
    {
        return Language::all();
    }
    public function getTraveler()
    {
        $sql = "SELECT * FROM travelvers_manifest_data  order by id desc limit 1";
        return    $data = DB::select($sql);
        // $check = Travelver::where('user_id', '=', '5')->get();
        // return Travelver::all();
    }
    public function getRequests(Request $request)
    {
        // $sql = "SELECT * FROM ride_requests  where ";
        //               return    $data = DB::select($sql);
        return SwipAccepted::all();
    }

    public function editProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',

        ]);

        if ($validator->fails()) {
            $output['response'] = false;
            $output['message'] = $validator->errors();
        } else {
            $output['response'] = true;
            $data = users::find($request->user_id);

            #Update the new Password
            $data = users::where('id', '=', $data->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'remainder' => $request->remainder,
                'security_date' => $request->security_date,
                'profile_photo' => $request->profile_photo,
                'type' => $request->type,
                'location' => $request->location,

            ]);
            $output['response'] = true;

            $output['message'] = "Profile Updated Successfully";

            header('Content-Type: application/json');
            return json_encode($output);
        }
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
    public function getMatches(Request $request)
    {
        return Matche::all();
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
            $data = users::find($request->user_id);

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
                $data = users::where('id', '=', $data->id)->update([
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
        try {
            $customer = users::where('email', $request->email)->get();

            if (count($customer) > 0) {

                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain . '/ResetPasswordLoad?token=' . $token;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = "Password Reset";
                $data['body'] = "Please click on below link to reset your password.";
                $data['auth'] = "Carry Me";

                Mail::to($request->email)->send(
                    new SendMailreset(
                        $token,
                        $request->email,
                        $data
                    )
                );


                $datetime = Carbon::now()->format('Y-m-d H:i:s');

                PasswordReset::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $datetime
                    ]
                );

                return response()->json(['success' => true, 'msg' => 'Please check your mail to reset your password.']);
            } else {
                return response()->json(['success' => false, 'msg' => 'User not found']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function ResetPasswordLoad(Request $request)
    {

        $resetData =  PasswordReset::where('token', $request->token)->get();
        if (isset($request->token) && count($resetData) > 0) {
            $customer = users::where('email', $resetData[0]['email'])->get();
            return view('ResetPasswordLoad', ['customer' => $customer]);
        }
    }



    public function ResetPassword(Request $request)
    {

        $request->validate([

            'new_password' => 'required',
            'confirm_password' => ['same:new_password']
        ]);

        $data = users::find($request->user_id);

        $data->password = FacadesHash::make($request->new_password);
        $data->update();

        PasswordReset::where('email', $data->email)->delete();

        echo "<h1>Successfully Reset Password</h1>";
    }
}
