<?php

namespace App\Http\Controllers;

use App\StudentDetail;
use App\Http\Requests;
use Illuminate\Http\Request;

class StudentDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * fetch the marks of logged in Student.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_marks(Request $request)
    {
        $studentId = $request->studentId;
        $marks = StudentDetail::select('id', 'english_score', 'math_score')->where('user_id', $studentId)->get();
        return response()->json(['status' => true, 'message' => 'Marks fetched!', 'marks' => $marks]);
    }
}
