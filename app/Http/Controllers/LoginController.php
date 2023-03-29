<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (session()->has('user')) {
            return redirect()->route('shop');
        } else {
            return view('login-logout.login');
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewresetpw()
    {
            return view('login-logout.resetpassword');
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
    public function login(Request $request)
    {
        $usernameRe = $request->username;
        $user = DB::table('users')->where('username', $usernameRe)->first();

        if(!empty($user)){
              
            $username = $user->username;
            $password = $user->password;
            $role = $user->urole;
            if (Hash::check($request->password, $password)) {
               if($role == 'user'){
                session()->put('user', $user->id);
                return redirect('shop');
                }elseif($role == 'admin'){
                    session()->put('admin', $user->id);
                    return redirect('items');
                }
                
            } else {
                session()->flash('error', 'รหัสผ่านผิด');
                return redirect('login');

            }
        }else{
            
            session()->flash('error', 'username นี้ไม่มีในระบบ');
            return redirect('login');
        }

      
    

    }

    public function logout()
    {
        session()->forget('user');
        session()->forget('admin');
        return redirect()->route('login.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
