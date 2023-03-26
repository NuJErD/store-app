<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\products;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;

class MyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order =Order::where('u_id',Session('user'))
        ->join('statuses', 'status','=','statuses.idst')
        ->where(function( $query) {
            $query->where('status', '1')
                  ->orwhere('status','2');
             
        }) ->get();
           
        
    
         
         
         //$count = count($order);
        //   for($i = 0; $i<=$count; $i++ ){
        //         $orderde = $order[$i]->order_detail()->get();
        //         $response['data'] = $orderde;
        //         dd($orderde);
        //    }
         
          
        return view('store.myorder',compact('order'));
    }
    
/** 
     
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getorder_detail(Request $request)
    {
        $order =OrderDetails::where('order_id',$request->id)
        
       ->join('products','product_id','=','products.id')
       ->select('order_details.*','products.picture')
       ->get();
        $response['data'] =$order;
       
        return response()->json($response);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cf_order(Request $request, Order $order)
    {
        $affected = DB::table('orders')
         ->where('id', $order->id)
         ->update([
               'status' => '3'
                   ]);
                   return response()->json("success");
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
