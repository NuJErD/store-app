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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>
<body> 
    <nav class="px-4 py-0 navbar">
        <div class ="logo">
         <h3 class="mb-0"><a href="{{route('items.index')}}">T-BRAND</a></h3>
        </div>
        <ul class="mb-0 menu">
        
        
     </ul>
        
    </nav>
<div id="frame">
    <div class="menu" style="height: 125vh">
        <ul class="navadmin">
            <a href="{{route('items.index')}}"><li>จัดการสินค้า  </li> </a>
          
            <a href="{{route('orders.index')}}">
            <li>จัดการคำสั่งซื้อ</li></a>
            <a href="{{route('brand.index')}}"><li>จัดการแบรนด์สินค้า  </li> </a>
            <a href="{{route('logout')}}"><li>ออกจากระบบ</li></a>
       
       
    </ul>
        
    </div>
    <div class="additems">
       
        <div class="mt-4 mb-4 card" style="height:270px">
            <div class="card-header"><h4>เพิ่มแบรนด์</h4></div>
            <div class="card-body">
                <form class="was-validated" action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                 
                <div class="inputtext">
                    <div class="col-md-9">
                <div class="inputtext-de">
                    <label class="d-flex"><p>Brand<div class="check-value" >**</div></p></label>
                
                    <input class="form-control " type="text" class="form-control" name="name"  required>
                    <div class="mt-2" style="color:#dc3545">**กรุณากรอกข้อมูล</div>
                </div>
                <div class="mt-4 d-flex">
                <a class="me-2" href="{{route('brand.index')}}"><input type="button" value="ยกเลิก" class="btn btn-danger" name="items"></a>
                <a><input type="submit" value="ยืนยัน" class="btn btn-dark" name="items"></a>
                </div>
            </div>
           </div>
            
                </form>
            </div>
        </div>
    </div>

        
   
 
</div>
    
</body>
</html>