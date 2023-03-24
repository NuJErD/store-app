<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\products;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $orderID =Order::where('u_id',Session('user'))->where('status',0)->value('id');
        

        if(!empty($orderID)){
            $orderde = DB::table('order_details')
             ->join('products', 'order_details.product_id', '=', 'products.id')
             ->select('products.*','products.picture','order_details.amount','order_details.order_id')
             ->where( 'order_details.order_id','=',$orderID)
             ->get();
             return view('store.cart',compact('orderde','orderID'));
       
         }else{
              
              return view('store.cart',compact('orderID'));
         }
        //dd('ssss');
       
        
         //$orderlist['data'] =OrderDetails::where('order_id',$order->id)->get();
       //  $pic = products::where('id',$orderlist->product_id)->value('picture');
        // Fetch all records
       // $response['data'] = $orderde;
        
       
       
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
