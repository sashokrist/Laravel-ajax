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
            $users['name'] = $request->name,
            $users['email'] = $request->email,
            $users['mobile_number'] = $request->mobile_number,
            $users['message'] = $request->message,

        ];
       return response()->json($users);
       // return json_encode(array('data'=>$userData));
    }

}
