<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use View;
use Validator;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        //
        //$users = User::all();

        $users = DB::table('users')
            ->join('user_role', 'users.id', '=', 'user_role.user_id')
            ->select('users.*', 'user_role.role_id')
            ->get();

        return view('admin.index', compact('users'));
    }

    public static function dash()
    {
        //
        $user = Auth::user(); 

        $roles = $user->roles()->first();
        //dd($roles);
               
        return view('admin.dash',compact('roles'));
    }

    public static function role(Request $request,$id)
    {
        //
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            
            ]);


        $user = User::find($id);
        $role = $user->roles()->first();

        dd($role);
        
        $roleUser =$request->roleName;

        $roleUpdate= Role::where('roleName', $roleUser)->first();

        //dd($roleUpdate);
        
        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->save();
        $user->roles()->detach($role);
        $user->roles()->attach($roleUpdate);

        

        //dd($role);
        $request->session()->flash('alert-success', 'Role was updated!');

        return \Redirect::to('/admin/dash');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View::make('admin.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ]);


        $user = new User;

        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->password = bcrypt($request->password);

        $user->save();

        //$users = User::all();
        $request->session()->flash('alert-success', 'User was created!');
        return \Redirect::to('/admin');
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
        $user = User::find($id);

        return View::make('admin.show', compact('user'));
        

    }

    public function roleAssign($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $role = $user->roles()->first();

        return View::make('admin.role', compact('user','role','roles'));
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ]);


        $user = User::find($id);

        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->password = bcrypt($request->password);

        $user->save();

        //$users = User::all();
        $request->session()->flash('alert-success', 'User was updated!');

        return \Redirect::to('/admin/dash');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //

        $user = User::find($id);
        $user->delete();

        $request->session()->flash('alert-success', 'User was deleted!');
        return view('admin.index');


    }
}
