@if (!Session::has('admin'))
   <script>window.location = "/login";</script>
             
        @endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>

    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body> 
<nav class="navbar px-4 py-0">
        <div class ="logo">
         <h3 class="mb-0"><a>T - B R A N D</a></h3>
        </div>
    </nav>
<div id="frame">
    <div class="menu">
        <ul class="navadmin">
        <li>
        <a href="{{route('items.index')}}">จัดการร้านค้า</a>
        </li>
        <li>
        <a href="{{route('orders.index')}}">คำสั่งซื้อ</a> </li>
       
       
    </ul>
        
    </div>
    <div class="additems">
       
        <div class="col-xl-4 mt-2">
            <div class="mb-4 card">
                <div class="card-header"><h4>เพิ่มข้อมูลสินค้า</h4></div>
                <div class="card-body">
        <form class="was-validated" action="{{route('items.update',$item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
        <div class="inputtext">
            <div class="col-md-5">
        <div class="inputtext-de">
            <p>Name:</p>
        
            <input type="text" class="form-control " name="name" value="{{$item->id}}"  required>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        
    </div>
    <div class="col-md-5">
        <div class="inputtext-de">
            <p>Festival:</p>
            <input type="text" class="form-control " name="festival" value="{{$item->festival}}" required>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>  
    </div>
        </div> 
        <div class="inputtext">
            <div class="col-md-5">
        <div class="inputtext-de">
            <p>Price:</p>
            <input type="number" class="form-control " name="price" step="0.1" min="0" value="{{$item->price}}"required>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div >
    </div>
        <div class="col-md-5">
        <div class="inputtext-de">
            <p>Brand:</p>
            <input type="text" class="form-control " name="brand"  value="{{$item->brand}}" required>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>  
    </div>
        </div> 
        
            <div class="mb-3">
                <p style="margin: 0%">Size</p>
                
                <select class="form-select" name="size" required >
                  <option value="{{$item->size}}"> {{$item->size}}</option>
                  <option value="S">S</option>
                  <option value="M">M</option>
                  <option value="L">L</option>
                  <option value="XL">XL</option>
                </select>
            
                <div class="invalid-feedback"> invalid select </div>
              </div>
         <div class="inputtext">    
             <div class="col-md-5">
                <div class="inputtext-de">
                      <p>Chest:</p>
                    <input type="text" class="form-control " name="chest" min="0" value="{{$item->chest}}" required>
                    <div class="invalid-feedback">Please fill out this field.</div>  
                </div>
        </div>
           
        <div class="col-md-5">
            <div class="inputtext-de">
            <p>Lenght:</p>
            <input type="text" class="form-control " name="lenght" value="{{$item->lenght}}" required>
            <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
    </div>
    <div class="inputtext">
        <div class="col-md-5">
            <div class="inputtext-de">
            <p>Color:</p>
            <input type="text" class="form-control " name="color"  value="{{$item->color}}"required>
            <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div> 
        <div class="col-md-5">
            <div class="inputtext-de">
            <p>Stock:</p>
            <input type="number" class="form-control " name="stock" min="0" value="{{$item->stock}}" required>
            <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div> 
    </div>
        
        <p>Picture</p>
        <img src="../../uploadpic/product/{{$item->picture}}" width="100px" height="100px" ><br><br>
        <input type="file" class="form-control " name="picture" >
        <div class="invalid-feedback">Please fill out this field.</div>
    
        <input type="submit" value="เพิ่มสินค้า" class="btn-submitadd" name="items">

    
        </form>
                </div>
 </div>
</div>
    </div>
</div>
    
</body>
</html>





