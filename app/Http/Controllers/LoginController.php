<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use View;
use Flash;
use Session;
use App\Models\User;

class LoginController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View::make('welcome');
    }

    public function login()
    {
        if(Auth::user())
        {
            return Redirect::to('home');        
        }
        else
        {
            return View::make('login');
        }
    }

    public function loginuser(Request $request)
    {
        $rules = array(
            'email'    => 'required', 
            'password' => 'required' 
        );

        // Create a validator instance
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            // Return with errors and input data
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $userdata = [
            'email'   =>  $request->email,
            'password' =>  $request->password, 
        ];
       
        if (Auth::guard('web')->attempt($userdata)) {
            return Redirect::to('home');        
        }else{
            Session::flash('alert-danger', 'Sorry, Invalid Username Or Password');
        }

        return redirect()->back();
    }

    public function register()
    {
        if(Auth::user())
        {
            return Redirect::to('home');        
        }
        else
        {
            return View::make('register');
        }
    }

    public function registeruser(Request $request)
    {
        // Define validation rules
        $rules = [
            'name'      => 'required|min:2|max:50',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:4',
            // 'gender'     => 'required',
            // 'hobbi'     => 'required|array',
            'psw-repeat' => 'required|same:password',
        ];

        // Create a validator instance
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            // Return with errors and input data
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $User = User::create([
            'name'      =>  $request->name,
            'email'    =>  $request->email,
            // 'gender'    => $request->gender,
            // 'hobbi'     => json_encode($request->hobbi),
            'password'  => bcrypt($request->password),
            ]);
        $User->save();
        
        Session::flash('alert-success', 'Register Sucessfully');

        return Redirect::to('login');
        //return redirect()->back();
    }

    public function logout(Request $request) {
        Auth::logout();
        return Redirect::to('login');
    }
}