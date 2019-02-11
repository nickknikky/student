<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware("role");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(10);

        return view('student/index')->with('users',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('status',1)->get()->toArray();
        $roles = array_column($roles,'name','id');

        return view('student/create')->with([
            'roles'=>$roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'We cannot have a user in the system without a name!'
        ];
        $this->validate($request,[
            'name' => 'required|min:3|Regex:/^[a-z-.]+( [a-z-.]+)*$/i',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'role_id'=>'required',
            'confirm_password'=>'required|min:6|same:password',
        ],$messages);

        $user = new User();
        // $user_details = new UserDetails();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->created_by = Auth::User()->id;
        $user->updated_by = Auth::User()->id;
        $user->save();

        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = new User;
        $user = $user->find($id);
        $roles = Role::where('status', 1)->get()->toArray();
        $roles = array_column($roles,'name','id');

        return view('student/edit')->with([
            'roles' => $roles,
            'users' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:3|Regex:/^[a-z-.]+( [a-z-.]+)*$/i',
            'password'=>'required|min:6',
            'role_id'=>'required',
            'confirm_password'=>'required|min:6|same:password',
        ]);

        $user = User::find($id);
        // $user_details = new UserDetails();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->updated_by = Auth::User()->id;
        $user->save();

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
