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
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<nav>
        <div class ="logo">
         <h1><a href="{{route('items.index')}}">T - B R A N D</a></h1>
        </div>
        <ul class="menu">
        
         <li><a href="{{route('logout')}}">Logout</a></li>
     </ul>
        
    </nav>
    <div id="frame">
        <div class="menu">
            <ul class="navadmin">
            
            <a href="{{route('items.index')}}"><li>จัดการร้านค้า  </li> </a>
          
            <a href="{{route('orders.index')}}">
            <li>คำสั่งซื้อ</li></a>
           
           
        </ul>
            </div>
        </div>
 <div class="table-items">
 <table class="table table-striped">
    
       
        <td>picture</td>
        <td>name</td>
        <td>festival</td>
        <td>pice</td>
        <td>brand</td>
        <td>size</td>
        <td>chest</td>
        <td>lenght</td>
        <td>color</td>
        <td>stock</td>
        <td><a href="{{route('indexadditems')}}" class="btn btn-dark">เพิ่มสินค้า</a></td>
       
       <tbody>
         @foreach ($products as $items)
            <tr>
            <td> <img src="uploadpic/{{$items->picture}}" width="100px" height="100px" ></td>
            <td>{{$items->name}}</td>
            <td>{{$items->festival}}</td>
            <td>{{$items->price}}</td>
            <td>{{$items->brand}}</td>
            <td>{{$items->size}}</td>
            <td>{{$items->chest}}</td>
            <td>{{$items->lenght}}</td>
            <td>{{$items->color}}</td>
            <td>{{$items->stock}}</td>
            
            <td>
               <a href="{{route('items.edit',$items->id)}}" class="btn btn-warning">edit</a><br><br>
               <form method="post" action="{{ route('items.destroy',$items->id) }}">                 
                  @csrf
                  @method('DELETE')                 
                  <button type="submit" class="btn btn-danger">Delete</button>
              </form><br>
                 
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


