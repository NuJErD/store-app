{{-- @if (!Session::has('admin'))
   <script>window.location = "/login";</script>
             
        @endif --}}
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="{{ url('css/style.css') }}">
            <link rel="stylesheet" href="{{ url('css/myorder.css') }}">
            <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
                crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
                 integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        </head>
        <script src="js/store.js"></script>
        <body>
        <nav>
                <div class ="logo">
                 <h1><a href="{{route('shop')}}">T - B R A N D</a></h1>
                </div>
                <ul class="menu">
                
                 <li><a href="{{route('logout')}}">Logout</a></li>
             </ul>
                
            </nav>
            
  
       
            <div class="container-shop">
             <div class="order-left">
                <h1>MY ORDERS</h1>  
                </div> 
                
              <div class="order_user" >
               
                @foreach($order as $or)
              
                 
                <div class="order_main">
                

               
                <details>
                    <summary>   
                <div class="order_in" >
                        <p>{{$or->ordernumber}}</p>
                        <div class="order-status{{$or->status}} " id="order-status" >
                         <p class="status-color{{$or->status}}">{{$or->detail}}</p>
                         
                        </div>
                </div>
                
               </summary>
               <div class="order_out_main">
                <div class="order-track" >
                  <h5><p>เลขพัสดุ: {{$or->tracking}} </p></h5>
                 
                   </div>
                <div class="order_out" id="order_out{{$or->id}}" >
                    
                   
                    
                 </div>
                 
                
                 <br>
                 <div class="myorder-total" >
                    <p>Total: {{$or->total}} THB</p>
                    <button  class="order-cf1" onclick="order_cf('{{$or->id}}')"><p>ยืนยันการรับสินค้า</p></button>
                     </div>
                </div>
                
                </div>
               
            </details>
                   
              
                    <script type="text/javascript">
                    order_status({{$or->status}})
                    getorder_detail({{$or->id}})
                    </script>
            @endforeach  
               </div> 
               <div  class="modal" style="display: none" >
                <div class="modal-bg"></div>
                <div class="modal-page">
                  
                    <div class="order-cf-d">
                      <p><h5>คุณได้รับสินค้าและได้ตรวจสอบสินค้าเรียบร้อยแล้ว</h5></p>
                    </div>
                   <div class="order-cf-cf"> 
                    
                  </div>                          
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