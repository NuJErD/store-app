@if (!Session::has('admin'))
   <script>window.location = "/login";</script>
             
        @endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>  
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
<nav class="navbar px-4 py-0">
        <div class ="logo">
         <h3 class="mb-0"><a >T-BRAND</a></h3>
        </div>
        <ul class="menu mb-0">
        
         <li><a href="{{route('logout')}}">Logout</a></li>
     </ul>
        
    </nav>
    
 
        <div class="menu " >
            <ul class="navadmin">
            
            <a href="{{route('items.index')}}"><li>จัดการสินค้า  </li> </a>
          
            <a href="{{route('orders.index')}}">
            <li>จัดการคำสั่งซื้อ</li></a>
            <a href="{{route('brand.index')}}"><li>จัดการแบรนด์สินค้า  </li> </a>
           
           
        </ul>
            </div>
        
 <div class="table-items">
 <table class="table table-striped">
    
    <thead class="table-dark">
        <td><h5>Picture</h5></td>
        <td><h5>Name</h5></td>
        <td><h5>Festival</h5></td>
        <td><h5>Pice</h5></td>
        <td><h5>Brand</h5></td>
        <td><h5>Size</h5></td>
        <td><h5>Chest</h5></td>
        <td><h5>Lenght</h5></td>
        <td><h5>Color</h5></td>
        <td><h5>Stock</h5></td>
        <td><a href="{{route('indexadditems')}}" class="btn btn-primary custom">เพิ่มสินค้า</a></td>
      </thead>
        
        
       
       <tbody>
         @foreach ($products as $items)
            <tr>
            <td> <img src="uploadpic/product/{{$items->picture}}" width="100px" height="100px" ></td>
            <td>{{$items->name}}</td>
            <td>{{$items->festival}}</td>
            <td>{{$items->price}}</td>
            <td>{{$items->brand}}</td>
            <td>{{$items->size}}</td>
            <td>{{$items->chest}}</td>
            <td>{{$items->lenght}}</td>
            <td>{{$items->color}}</td>
            <td>{{$items->stock}}</td>
            
            <td >
                <div class="col-md-3">
                    <i class="bi bi-trash3-fill"></i>
                    
               <a href="{{route('items.edit',$items->id)}}" class="btn btn-warning custom">edit</a>
              
            </div>
               <br>
               <form method="post" action="{{ route('items.destroy',$items->id) }}">                 
                  @csrf
                  @method('DELETE')                 
                  <button type="submit" class="btn btn-danger custom">Delete</button>
              </form>
                 
                  {{-- <a href="{{route('items.destroy',$items->id)}}" class="btn btn-danger">delete </a> --}}
                 
            </td>
          
            </tr>
            
        @endforeach

      </tbody>
    
 </table>
 
 
</div>



 
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>


