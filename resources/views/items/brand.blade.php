@if (!Session::has('admin'))
   <script>window.location = "/login";</script>
             
        @endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<nav class="px-4 py-0 navbar">
        <div class ="logo">
         <h3 class="mb-0"><a href="{{route('items.index')}}" >T - B R A N D</a></h3>
        </div>
        <ul class="menu">
        
         <li><a href="{{route('logout')}}">Logout</a></li>
     </ul>
        
    </nav>
    
   
        <div class="menu">
            <ul class="navadmin">
            
            <a href="{{route('items.index')}}"><li>จัดการสินค้า  </li> </a>
          
            <a href="{{route('orders.index')}}">
            <li>จัดการคำสั่งซื้อ</li></a>
            <a href="{{route('brand.index')}}"><li>จัดการแบรนด์สินค้า  </li> </a>
            <a href="{{route('logout')}}"><li>ออกจากระบบ</li></a>
       
           
        </ul>
            </div>
        
 <div class="table-items">
    <div class="" style="width: 30%">
 <table class="table table-hover table-bordered">
    
       
    <thead class="table-dark">
      
        <td class="w-50"><h5>brand</h5></td>
        
        <td  class="w-25">
            <div class="d-flex justify-content-center">
            <a href="addbrand" class="btn btn-primary">เพิ่มแบรนด์</a>
        </div>
    </td>
    </thead>
       <tbody>
         @foreach ($brand as $b)
            <tr >
            
            <td >{{$b->name}}</td>
            
            <td class="d-flex flex-column align-items-center">
                <div class="mb-2 ">
               <a href="{{route('brand.edit',$b->id)}}" class="btn btn-warning custom">แก้ไข</a>
            </div>
               
               <form method="post" action="{{ route('brand.destroy',$b->id) }}">                 
                  @csrf
                  @method('DELETE')                 
                  <button type="submit" class="btn btn-danger custom">ลบ</button>
              </form>
                 
                  {{-- <a href="{{route('items.destroy',$items->id)}}" class="btn btn-danger">delete </a> --}}
                 
            </td>
          
            </tr>
            
        @endforeach
      </tbody>
    
 </table>
</div>
</div>

 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>