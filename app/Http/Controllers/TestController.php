<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
      //  dd($request->all());
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required',
            'mobile_number' => 'required',
            'message' => 'min:10'
        ]);
        $data =  [
            $users['Name'] = $request->name,
            $users['Email'] = $request->email,
            $users['Mobile_number'] = $request->mobile_number,
            $users['Message'] = $request->message,

        ];
       return response()->json($users);
       // return json_encode(array('data'=>$userData));
    }

}
