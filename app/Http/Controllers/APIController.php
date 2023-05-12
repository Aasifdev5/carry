<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function sign_in(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            $output['response'] = false;
            $output['message'] = $validator->errors();
        } else {
            $input = $request->all();
            $v = $input['password'];
            $output['response'] = true;
            // print_r($v);
            // $pass=Hash::make($v);
            $email = $input['email'];
            $var = DB::table('customers')->where('id', $input['email'])->first();

            if (Hash::check($v, $var->password) || $v == $var->password) {
                //    $data['id']=$user_details;
                $output['response'] = true;
                $output['message'] = "Login Success";
                $output['data'] = $var;
            } else {
                $output['response'] = false;
                $output['message'] = 'Invalid';
            }
        }
    }
}
