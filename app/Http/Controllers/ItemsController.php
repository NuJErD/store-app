<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\products;
use session;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  DB::table('products')->get();
        
        return view('items.index',compact('products'));
    }
    public function ItemJS(Request $request)
    {
         $id = $request->id;
 
         $item = products::select('*')->where('id', $id)->get();
         
   
        // Fetch all records
        $response['data'] = $item;
        
       return response()->json($response);
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
            $items = new products;
            
            $items->name = $request->name;
            $items->festival = $request->festival;
            $items->price = $request->price;
            $items->brand = $request->brand;
            $items->size = $request->size;
            $items->chest = $request->chest;
            $items->lenght = $request->lenght;
            $items->color = $request->color;
            $items->stock = $request->stock;
            $picture = $request->file('picture');
            $name_gen = hexdec((uniqid())); 
            $name_type = strtolower($picture->getClientOriginalExtension());
            $picname = $name_gen.'.'.$name_type;
            
            
            $items->picture = $picname;    
            $picture->move(public_path('uploadpic'), $picname); //set uploat floder path
            $items->save();
            return redirect('items');
            
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(products $item)
    {
     
       
       return view('items.edit')->with('item',$item);
       
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $item)
    {
        
        $affected = DB::table('products')
              ->where('id', $item->id)
              ->update([
                    'name' => $request->name,
                    'festival' => $request->festival,
                    'price' => $request->price,
                    'brand' => $request->brand,
                    'size' => $request->size,
                    'chest' => $request->chest,
                    'lenght' => $request->lenght,
                    'color' => $request->color
                ]);

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,products $item)
    {
         echo('sss');
        unlink("./uploadpic/".$item->picture);
        DB::table('products')->where('id', $item->id)->delete();
        return redirect('items');
    }
}
