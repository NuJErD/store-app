<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\users;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkpw(Request $request)
    {   
        $passwordold = users::where('id', session('user'))->value('password');
         

         if(Hash::check($request->pw , $passwordold)){

            return response()->json("success");
         }else{
            $request->session()->flash('errorpassword','รหัสผ่านไม่ตรงกัน');
            return response()->json('error');
         }
         
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newpw(Request $request)
    {   
        if($request->newpw != $request->cfpw){
            
            return response()->json("รหัสผ่านไม่ตรงกัน");
        }elseif(strlen($request->newpw) > 20 || strlen($request->newpw) < 5){
           
            return response()->json("รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร");
        }else{
            $passwordhashed = Hash::make($request->newpw);
            $affected = DB::table('users')
            ->where('id', session('user') )
            ->update([
                  'password' => $passwordhashed
   
                      ]);
            
            $request->session()->flash('success','เปลี่ยนรหัสผ่านสำเร็จ'); 
            return response()->json('success');
        }
       
        
         
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $user = users::where('id',Session('user'))->first();
      
        $profile = users::where('id',Session('user'))->value('picture');
        
       
        return view('store.editprofile',compact('user','profile'));
       
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $user)
    {   
       
        $usercheck = users::where('username',$request->username)->value('username');
       
        
        
    if($user->username == $request->username){
        $affected = DB::table('users')
        ->where('id', $user->id)
        ->update([
            
            'firstname' => $request->firstname,
           
            'lastname' => $request->lastname,
            'phonenumber' => $request->phonenumber ,
            
            'address' => $request->address ,
            'province' => $request->province ,
            'district' => $request->district ,
            'postcode' => $request->postcode

                  ]);
           

    }elseif(isset($usercheck)){

        session()->flash('error','username นี้มีอยู่ในระบบแล้ว');

    }else{
        $affected = DB::table('users')
        ->where('id', $user->id)
        ->update([
            'username' => $request->username,
            'firstname' => $request->firstname,
           
            'lastname' => $request->lastname,
            'phonenumber' => $request->phonenumber ,
            
            'address' => $request->address ,
            'province' => $request->province ,
            'district' => $request->district ,
            'postcode' => $request->postcode

                  ]);}

                  
    return redirect()->route('user.edit',$user->id);
        }
        

                /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editpic(Request $request, users $user)
    {  
         $oldpic = users::where('id',$user->id)->value('picture');
            $validator = Validator::make($request->all(), [
                'picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|'
            ]);
            
            if ($validator->fails()) {
                session()->flash('error','โปรดเลือกไฟล์ที่เป็นรูปภาพ (jpg , png , jpeg , gif , svg)');
            } else {
               
                if(isset($oldpic)){
                unlink("./uploadpic/uploadpicProfile/".$oldpic);
                }

             $picture = $request->file('picture');
             $name_gen = hexdec((uniqid())); 
             $name_type = strtolower($picture->getClientOriginalExtension());
             $picname = $name_gen.'.'.$name_type;
            
                $affected = DB::table('users')
             ->where('id', $user->id)
             ->update([
                 'picture' => $picname
                
     
                       ]);
                $picture->move(public_path('uploadpic/uploadpicProfile'), $picname); //set uploat floder path
                session()->flash('success','อัพโหลดรูปเรียบร้อย');

            }     
  
             return redirect()->route('user.edit',$user->id);   
        
       
    }
         /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletepic(Request $request)
    {  $pic =$request->pic;
        if(isset($pic)){
             
            unlink("./uploadpic/uploadpicProfile/".$pic);
        $affected = DB::table('users')
        ->where('picture', $pic)
        ->update([
            'picture' => null          
                  ]);
            session()->flash('succcess',' ลบรูปภาพเรียบร้อย');
        }else{
             session()->flash('error','ไม่มีรูปภาพ');
        }
            
        
        // unlink("./uploadpic/uploadpicProfile/".$pic);
        // $affected = DB::table('users')
        // ->where('picture', $pic)
        // ->update([
        //     'picture' => null
           

        //           ]);
        
        return response()->json();
       // if(isset($pic)){

       // }
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
