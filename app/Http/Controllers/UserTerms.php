<?php

namespace App\Http\Controllers;

use App\Models\Terms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;

class UserTerms extends Controller
{
    public function user_term(Request $request)
    {
        $user_terms = DB::table('user_terms')->get();
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('terms', compact('data'), ['user_terms' => $user_terms]);
    }
    public function add_term(Request $request)
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('add_term', compact('data'));
    }

    public function save_term(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            $terms = new Terms();
            $request->validate([
                'term_name' => 'required',

            ]);
            $terms->term_name = rtrim($request->term_name);
            $response = $terms->save();
            if ($response) {
                return redirect('user_term')->with('success', 'Successfully Added');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }

    public function delete_term(Request $request)
    {
        $terms = Terms::find($request->id);
        $terms->delete();
        return back()->with('success', 'Successfully Deleted Record');
        // $vehicle = vehicle::where('id', $request->id)->delete();

    }
    public function edit_term(Request $request)
    {
        $terms = Terms::find($request->id);

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
        }
        return view('edit_term', compact('data'), ['terms' => $terms]);
    }
    public function update_term(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();

            $request->validate([
                'term_name' => 'required',

            ]);
            $terms = Terms::where('id', '=', $request->term_id)->first();
            $terms->term_name = rtrim($request->term_name);

            $terms->update();
            if ($terms) {
                return redirect('user_term')->with('success', 'Successfully Updated');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
}
