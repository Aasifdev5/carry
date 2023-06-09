<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IlLuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;
use App\Models\PersonalAccess;


class LanguageTranslationController extends Controller
{
    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function index(Request $request)
    {
        $languages = DB::table('languages')->get();


        $columns = [];
        $columnsCount = $languages->count();

        $data = array();
        if (Session::has('loginId')) {
            $data = Customers::where('id', '=', Session::get('loginId'))->first();
            if ($languages->count() > 0) {
                foreach ($languages as $key => $language) {
                    if ($key == 0) {
                        $columns[$key] = $this->openJSONFile($language->code);
                    }
                    $columns[++$key] = ['data' => $this->openJSONFile($language->code), 'lang' => $language->code];
                }
            }
        }


        $token = Session::get('token');
        $check = PersonalAccess::where('token', '=', $token)->first();
        if (!empty($check)) {
            return view('languages', compact('languages', 'columns', 'columnsCount', 'data'));
        } else {
            Session::forget('loginId');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required',
            'value' => 'required',
        ]);


        $data = $this->openJSONFile('en');
        $data[$request->key] = $request->value;


        $this->saveJSONFile('en', $data);


        return redirect()->route('languages');
    }


    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($key)
    {
        $languages = DB::table('languages')->get();


        if ($languages->count() > 0) {
            foreach ($languages as $language) {
                $data = $this->openJSONFile($language->code);
                unset($data[$key]);
                $this->saveJSONFile($language->code, $data);
            }
        }
        return response()->json(['success' => $key]);
    }


    /**
     * Open Translation File
     * @return Response
     */
    private function openJSONFile($code)
    {
        $jsonString = [];
        if (File::exists(base_path('resources/lang/' . $code . '.json'))) {
            $jsonString = file_get_contents(base_path('resources/lang/' . $code . '.json'));
            $jsonString = json_decode($jsonString, true);
        }
        return $jsonString;
    }


    /**
     * Save JSON File
     * @return Response
     */
    private function saveJSONFile($code, $data)
    {
        ksort($data);
        $jsonData = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents(base_path('resources/lang/' . $code . '.json'), stripslashes($jsonData));
    }


    /**
     * Save JSON File
     * @return Response
     */
    public function transUpdate(Request $request)
    {
        $data = $this->openJSONFile($request->code);
        $data[$request->pk] = $request->value;


        $this->saveJSONFile($request->code, $data);
        return response()->json(['success' => 'Done!']);
    }


    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function transUpdateKey(Request $request)
    {
        $languages = DB::table('languages')->get();


        if ($languages->count() > 0) {
            foreach ($languages as $language) {
                $data = $this->openJSONFile($language->code);
                if (isset($data[$request->pk])) {
                    $data[$request->value] = $data[$request->pk];
                    unset($data[$request->pk]);
                    $this->saveJSONFile($language->code, $data);
                }
            }
        }


        return response()->json(['success' => 'Done!']);
    }
}
