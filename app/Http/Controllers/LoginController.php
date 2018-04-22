<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->is('login')) {
            return view('login');
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'email' => 'required | email | exists:users,email',
            'password' => 'required'
        ];
        $this->validate($request, $rules);
        
        $auth = [
            'email' => $request->email,
            'password' => $request->password
        ];        
        if (auth()->attempt($auth)) {
            if (auth()->user()->isAdmin()) {
                return redirect()->route('index');
            }
            elseif (auth()->user()->isManager()) {
                $request->session()->flush();
                dd("Under Contraction");
                // return redirect()->route('index');
            }
            else{
                $request->session()->flush();
                return redirect()->route('login');
            }
        }else{
            return back()->with('status', 'You Need to verify your account');
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        \Auth::logout();
        return redirect()->route('login');
    }
}
