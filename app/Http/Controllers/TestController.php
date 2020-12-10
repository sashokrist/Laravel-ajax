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
            'email' => 'required'
        ]);
        $data =  $request->all();

       return response()->json($data);
       // return json_encode(array('data'=>$userData));
    }

}
