<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\users;
use Illuminate\Support\Facades\Hash;
use session;

class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register.index');
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
        $user = new users;
        $urole = 'user';
        $username = $request->username;
        $password = $request->password;
        $usernamecheck = DB::table('users')->where('username', $username)->value('username');
        if(isset($usernamecheck)){
          $request->session()->flash('error','username นี้มีอยู่ในระบบแล้ว');
            return view('register.index');
            
       } elseif($request->password != $request->c_password){
       
        $request->session()->flash('error','รหัสผ่านไม่ตรงกัน');
         return view('register.index');
       }elseif(strlen($request->password) > 20 || strlen($request->password) < 5){
        $request->session()->flash('error','รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร');
         return view('register.index');
       }
        else{ 
        $passwordhashed = Hash::make($password);
        $user->firstname = $request->firstname ;
        $user->lastname = $request->lastname ;
        $user->phonenumber = $request->phonenumber ;
        $user->username = $request->username ;
        $user->password = $passwordhashed ;
        $user->address = $request->address ;
        $user->region = $request->region ;
        $user->city = $request->city ;
        $user->postcode = $request->postcode;
        $user->urole = $urole;
        if(isset($request->picture)){
        $picture = $request->file('picture');
            $name_gen = hexdec((uniqid())); 
            $name_type = strtolower($picture->getClientOriginalExtension());
            $picname = $name_gen.'.'.$name_type;
            
            
            $user->picture = $picname;    
            $picture->move(public_path('uploadpic/uploadpicProfile'), $picname);
        }
        $user->save();
        return redirect()->route('shop');
        
        
      }
     

       
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkusername(Request $request)
    {  
        
        $username = users::where('username',$request->name)->first();
        if(isset($username)){
            return response()->json('fail');
          
        }else if(isset($request->name)){
            return response()->json('success');
           
        }else{
            return response()->json('null');
        }
      
        
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
        //
    }
}
