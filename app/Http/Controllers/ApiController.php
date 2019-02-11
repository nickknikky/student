<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * fetch the marks of logged in Student.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUser(Request $request)
    {
        $user = User::where('api_token', $request->api_token)->get();
        return response()->json(['status' => true, 'message' => 'Marks fetched!', 'marks' => $user]);
    }
}
