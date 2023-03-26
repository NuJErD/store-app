<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
         $order =Order::join('statuses', 'status','=','statuses.idst')
         ->join('users','u_id','users.id')
         ->select('orders.*','statuses.detail','users.firstname','users.lastname')
         ->get();
         
        
        
        return view('orders.index',compact('order',$order));
    }


    public function CartJS()
    {   
        $order =Order::where('u_id',Session('user'))->where('status',0)->first();

        
       if(!empty($order)){
        $orderde = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('products.*','products.picture','order_details.amount','order_details.order_id')
            ->where( 'order_details.order_id','=',$order->id)
            ->get();
        $response['data'] = $orderde;
        
        return response()->json($response);
       } else{
        return null;
       }
       
        
         //$orderlist['data'] =OrderDetails::where('order_id',$order->id)->get();
       //  $pic = products::where('id',$orderlist->product_id)->value('picture');
        // Fetch all records
        
       
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
        $order =Order::where('u_id',Session('user'))->where('status',0)->first();
        $user = DB::table('users')->where('id',session('user'))->value('address');
        $stock = products::where('id',$request->id)->value('stock');
       if($stock !=0){
        if($order){
            $orderckeck = $order->order_detail()->where('product_id',$request->id)->first();
            if($orderckeck){
              $amount = $orderckeck->amount +1 ;
              if($amount<=$stock){
                  $orderckeck->update([
                  'amount' => $amount
              ]);
              }else{
                  session()->flash('error','สินค้าไม่เพียงพอ');
              }
              
              
            }else{
                
              $orderdeatail = new OrderDetails;
              $orderdeatail->order_id = $order->id;
              $orderdeatail->product_id = $request->id;
              $orderdeatail->product_name = $request->name;
              $orderdeatail->product_size =$request->size;
              $orderdeatail->product_price = $request->price;
              $orderdeatail->amount = 1;
              $orderdeatail->save();
            }
          }else{
            
            $ordernumber = 'TB-'. date('Ymd') . str_pad(mt_rand(1, 9999),2, '0', STR_PAD_LEFT);
          
          $order = new Order;
          
          $order->ordernumber = $ordernumber;
          $order->status = 0;
          $order->u_address ='bang';
          $order->u_id = Session('user') ;
          $order->u_address = $user;
          $order->save();
  
          $orderdeatail = new OrderDetails;
              $orderdeatail->order_id = $order->id;
              $orderdeatail->product_id = $request->id;
              $orderdeatail->product_name = $request->name;
              $orderdeatail->product_size =$request->size;
              $orderdeatail->product_price = $request->price;
              $orderdeatail->amount = 1;
              $orderdeatail->save();
          }
       }else{
        session()->flash('error','สินค้าหมดแล้ว');
       }
        
        
        

        
         return redirect(route('shop'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {       
           // $orderID =Order::where('u_id',Session('user'))->where('status',0)->value('id');
            $orderckeck = $order->order_detail()->where('product_id',$request->p_id)->first();
            //เช็คstockสินค้า
            $stock = products::where('id',$request->p_id)->value('stock');
            //ดึงข้อมูลจากorder_detail
            $orderde = $order->order_detail()->get();
            $count =count($orderde);
            
            
            //return response()->json('9999');
            
         if($request->checkout == "checkout"){ 
           
            //uploadslip
            $picture = $request->file('picture');
           
            $name_gen = hexdec((uniqid())); 
            $name_type = strtolower($picture->getClientOriginalExtension());
            $picname = $name_gen.'.'.$name_type;
            
            
            $affected = DB::table('orders')
         ->where('id', $order->id)
         ->update([
               'total' => $request->totalsum,
               'status' => 1,
               'slip' => $picname,
               'updated_at' => Carbon::now()

                   ]);
                  
            $picture->move(public_path('uploadpic/uploadslip'), $picname);   

            
            
                
            
                //update stock
                for($i = 0;$i<$count;$i++){
                    $stock = products::where('id',$orderde["$i"]->product_id)->value('stock');
                    $amount =$orderde["$i"]->amount;
                    $stocknew = $stock-$amount;
                    $affected = DB::table('products')
                   ->where('id', $orderde["$i"]->product_id)
                   ->update([
                         'stock' =>  $stocknew
                              ]);
               
               
                            }
                
                    return redirect()->route('myorder.index');
        }else{
            
            if($request->decrease == "decrease"){
                $amount = $orderckeck->amount -1 ;
                if($amount!=0){
                    $orderckeck->update([
                        'amount' => $amount
                    ]);  
                }else{
                    $orderckeck->delete();
                    $orderckeck = $order->order_detail()->get();
                    
                    if(isset($orderckeck)){
                        
                         $order->delete();
                         
                         return redirect()->route('cart.index');
                    }
                   
                }
                
                return redirect()->route('cart.index');
                //dd($orderckeck);
                
            }elseif($request->increase == "increase"){
                $amount = $orderckeck->amount +1 ;
                if($amount<=$stock){
                    
                    $orderckeck->update([
                        'amount' => $amount
                    ]);
                    
            }  else{
                
                session()->flash('error','สินค้าเหลือ'.$stock.'ชิ้น');
                return redirect()->route('cart.index');
                }
            }   
        } return redirect()->route('cart.index');
     }
    
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    
     public function updatecart(Request $request, Order $order){
        $orderckeck = $order->order_detail()->where('product_id',$request->p_id)->first();
        //เช็คstockสินค้า
        
        $stock = products::where('id',$request->p_id)->value('stock');
        //ดึงข้อมูลจากorder_detail
        $orderde = $order->order_detail()->get();
        $count =count($orderde);
        $amount =$request->amountnew;
        
       
         
        if($request->type == "decrease"){ 
           
            $orderckeck->update([
                'amount' => $amount
            ]);
           
        }else if($request->type == "increase"){
            if($amount <= $stock){
                 $orderckeck->update([
                'amount' => $amount
            ]);
            }else{
                session()->flash('error','สินค้าเหลือ'.$stock.'ชิ้น');
            }
           
        }else if($request->type == "delete"){
            $orderckeck->delete();
            $orderckeck = $order->order_detail()->get();
                    
            if(isset($orderckeck)){
                
                 $order->delete();
                 
                 
            }
        }else{
           
            $affected = DB::table('orders')
         ->where('id', $order->id)
         ->update([
               'status' => '2'
                   ]);
        }  

        return response()->json("success");
     }
    
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    
     public function addtrack(Request $request, Order $order){
        $affected = DB::table('orders')
         ->where('id', $order->id)
         ->update([
               'tracking' => $request->track
                   ]);
         
        return response()->json("success");
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
