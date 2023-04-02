<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\Order;
use App\Models\products;
use App\Models\users;
use App\Models\brand;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function test()
    // {
        
        
    //     // return response($products);
    //       return view('store.test');
       
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  DB::table('products')->get();
        $brand = brand::get();
        
        // return response($products);
          return view('store.store',compact('products','brand'));
       
    }
    public function shopindex()
    {   
        $profile = users::where('id',Session('user'))->value('picture');
        $products =  DB::table('products')->get();
         $orderID =Order::where('u_id',Session('user'))->where('status',0)->value('id');
        if((Session()->has('user'))){
           $user =users::where('id',session('user'))->value('id');
        }else{
            $user = 0;
        }
       
       
        $brand = brand::get();
         return view('store.customer',compact('products','orderID','profile','brand','user'));
       
    }
    public function data()
    {
        $products =  DB::table('products')->get();
        
         return view('store.customer',compact('products'));
       
    }

    public function itemDetail(Request $request)
    {
        //$id = $request->itemID;
      //  $item = DB::table('products')->where('id',$id)->first();
      return view('register.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->search;
        if(isset($search) && $search != ''){
            $product = products::where(function($query) use($search){
                
                $query->where('name','like','%'. $search . '%')
                ->orwhere('festival','like','%'. $search . '%')
                ->orwhere('brand','like','%'. $search . '%');
            })->get();
        } else{
            $product =products::all();
        }
        
        return response()->json($product);
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
