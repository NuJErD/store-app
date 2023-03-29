@if (!Session()->has('user') && !Session()->has('admin'))
    <script>
        window.location = "/login";
    </script>
@endif

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/cart.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<script src="js/store.js"></script>

<body>
    <nav class="navbar">
        <div class="logo">
            <h3><a href="{{ route('shop') }}">T-BRAND</a></h3>
        </div>

        <ul class="menu">


            <li><a href="">chat with me</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </nav>
    <div class="cck">
    <div class="mt-5 ms-5 card"  style="height: 22rem; width:40rem;">
      <div class="card-header">
        <p>ขั้นตอนการชำระเงิน</p>
      </div>
        <div class="card-body">
         <div class="step">
        <p>1.เลือกวิธีการชำระเงิน เลือกเลขเลขบัญชีหรือกด Scan QR-Code</p>
        <p>2.ชำระเงิน (สามารถดูยอดเงินที่ต้องชำระได้ที่แถบ total ด้านล่าง)</p>
        <p>3.กด Choose File แล้วเลือกรูป Slip</p>
        <p>4.กด ยืนยันการสั่งซื้อ</p>
      </div>
      </div>
      
    </div>
    <div class="checkout-out">
      
     <div class="checkout-main">   
     <div class="checkout-1">
        <div class="">
           <img src="../../uploadpic/kbank-thailand-logo.png" width="40px" height="40px">         
       </div>
       
       <div class="qr">
        <p>222-222-222</p>
     </div>
     </div>
     <div class="checkout-1" onclick="qrcode()">
        <div class="qr">
        <p>Scan QR - Code</p>           
    </div>
    <div class="qr"  >
        <img src="../../uploadpic/qr_code.png" width="50px" height="50px">
    </div>
   
     </div>
     <form  action="{{route('orders.update',$orderID)}}" method="POST" enctype="multipart/form-data">
     <div class="checkout-1-1">
        
        
            @csrf
            @method('PUT')
            <div id="totalsum">
                
            </div>
            <input type="hidden"  name="checkout" value="checkout">
            <div class="add-slip-1">
              <input type="file">
            {{-- <h2>Add Slip</h2> --}}
            </div>
           

        
    
     </div>
     
     <div class="checkout-1">
     <div class="total1" id="total">
        <script type="text/javascript">
            total();
        </script>
         </div>
        
    </div>
    <div class="checkout-cf"  >
        
            <button class="add-cart" >
                ยืนยันการสั่งซื้อ
            </button>            
    </div>
 

     </div>
     </form>
    </div>
 
    <div  class="qrcode" style="display:  none" >
        <div class="modal-bg" onclick="closemodalqrcode()"></div>
        
            
             
            <div class="close-qr" onclick="closemodalqrcode()">
               <i class="fa-solid fa-xmark fa-bounce" style="color: #ffffff">Close</i>
               
               
            </div>
           
           
               <div class="qrcode-show">
            </div>
        
       
    
    
</div>
    </div>





 <!-- Site footer -->
 <footer class="footer-distributed">

    <div class="footer-left">

      <h3><span>T</span>-<span>BRAND</span></h3>

      <p class="footer-links">
        <a href="#" class="link-1">Home</a>
        
        <a href="#">Blog</a>
      
        

      <p class="footer-company-name">Company Name © 2015</p>
    </div>

    <div class="footer-center">

      <div>
        <i class="fa fa-map-marker"></i>
        <p><span>444 S. Cedros Ave</span> Solana Beach, California</p>
      </div>

      <div>
        <i class="fa fa-phone"></i>
        <p>099-9999999</p>
      </div>

      <div>
        <i class="fa fa-envelope"></i>
        <p>T-BRAND@gmail.com</p>
      </div>

    </div>

    <div class="footer-right">

      

      <div class="footer-icons">

        <a href="#"><i class="fa-brands fa-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-square-twitter"></i></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
       

      </div>

    </div>

  </footer>


   


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>
