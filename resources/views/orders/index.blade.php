@if (!Session::has('admin'))
   <script>window.location = "/login";</script>
             
        @endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="js/store.js"></script>
</head>
<body>
<nav>
        <div class ="logo">
         <h1><a href="{{route('store.index')}}">T - B R A N D</a></h1>
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
        
        <div class="order">
     <table class="table table-striped">
    
       
        <td><h5>เลขคำสั่งซื้อ</h5></td>
        <td><h5>วันที่สั่งซื้อ</h5></td>
        <td><h5>ชื่อลูกค้า</h5></td>
        <td><h5>จำนวนเงิน</h5></td>
        
        
        <td><h5>สถานะ</h5></td>
        <td><h5>สลิป</h5></td>
     
        
      
       <tbody>
        @foreach($order as $or)
            <tr>
            
            <td> {{$or->id}}   </td>
            <td> {{$or->created_at}}   </td>
            <td> {{$or->firstname}} &nbsp; {{$or->lastname}}  </td>
            <td> {{$or->total}}       </td>
           
            <td>
                <select id="status{{$or->id}}" onchange="updatestatus('{{$or->id}}')">
                <option value="{{$or->status}}">{{$or->detail}}</option>
                <option value="2">จัดส่งแล้ว</option>
                </select>
            </td>
            
            <td>
            {{$or->updated_at}}&nbsp; 
            <button type="button" class="btn btn-info" onclick="showslip('{{$or->slip}}')">สลิป</button>
        </td>
            
            
            
           
            
           
               
          
            </tr>
        @endforeach     
       
      </tbody>
    
    </table>
        </div>
        <div  class="slip" style="display:  none" >
            <div class="modal-bg"></div>
            <div class="modal-page">
                <div class="modal-menu">
                 <h5>slip</h5>
                <div class="close" onclick="closemodalslip()">
                   <i class="fa-solid fa-xmark"></i>
                </div>
               </div>
               
                   <div class="slippic"></div>
            
           
        
        </div>
    </div>
       
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>