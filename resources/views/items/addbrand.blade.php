@if (!Session::has('admin'))
   <script>window.location = "/login";</script>
             
        @endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body> 
<nav class="navbar px-4 py-0">
        <div class ="logo">
         <h3 class="mb-0"><a >T - B R A N D</a></h3>
        </div>
    </nav>
<div id="frame">
    <div class="menu">
        <ul class="navadmin">
            <a href="{{route('items.index')}}"><li>จัดการสินค้า </li> </a>
          
            <a href="{{route('orders.index')}}">
            <li>จัดการคำสั่งซื้อ</li></a>
            <a href="{{route('brand.index')}}"><li>จัดการแบรนด์สินค้า  </li> </a>
       
       
    </ul>
        
    </div>
    <div class="additems">
       
    
        
        <form class="was-validated" action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
         <h1>เพิ่มข้อมูล</h1> 
        <div class="inputtext">
            <div class="col-md-9">
        <div class="inputtext-de">
            <p>brand:</p>
        
            <input type="text" class="form-control " name="name"  required>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <input type="submit" value="ยืนยัน" class="btn-submitadd" name="items">
        
    </div>
   </div>
    
        </form>
 
</div>
    
</body>
</html>