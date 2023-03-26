@if (!Session()->has('user') && !Session()->has('admin'))
    <script>
        window.location = "/login";
    </script>
@endif

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" >
       
</head>
<script src="js/store.js"></script>

<body>
    <nav >
        <div class="logo">
            <h1><a href="{{ route('shop') }}"><span>T</span>-<span>BRAND</span></a></h1>
        </div>

        <ul class="menu" >
           @if($orderID)
            <div class="cart"   >
                <script type="text/javascript">
                    cartcount();
                 </script>
                <li><a href="{{ route('cart.index') }}"><i class="fas fa-regular fa-cart-shopping" ></i></a></li>
                <div id="cartcount" class="cartcount">

                </div> 
                
            </div>
                <div class="order-list"> 
                    <li><a href="{{route('myorder.index')}}"><p style="color: white">Myorder</p></a></li>
                </div>
                
           
            @endif
            @if(!$orderID)
            <div class="cart" >
                <li><a href="{{ route('cart.index') }}"><i class="fas fa-regular fa-cart-shopping"></i></a></li>
                
            </div>
            <div class="order-list"> 
                <li><a href="{{route('myorder.index')}}"><p style="color: white">Myorder</p></a></li>
            </div>
            @endif
            <div class="order-list"> 
              <li><a href="{{route('user.edit',Session('user'))}}"><p style="color: white">Profile</p></a></li>
          </div>


            <li>
              @if($profile)
              <img  src="uploadpic/uploadpicProfile/{{$profile}}" width="40px" height="40px">
              @endif
              @if(!$profile)
              <img  src="http://bootdey.com/img/Content/avatar/avatar1.png" width="40px" height="40px">
              @endif
            </li>
           
            {{-- <li><a href="{{ route('logout') }}"><p style="color: white">Logout</p></a></li> --}}
        </ul>
    </nav>
    
    <div class="container-shop">
      
        <div class="menu-item">
            <input type="text" class="sidebar-serch" placeholder="Serch" onkeyup="search(this.value)">


            </ul>

        </div>
        <div class="main">
          @if ($error = Session::get('error'))
      <div class="alertmain">
          <div class="alerterror" >
        {{$error}}
       </div>
      </div>
      @endif
        <div class="items">
         
            @foreach ($products as $item)
                <div class="itemslist" onclick="myFunction('{{ $item->id }}')">

                    <div class="itemslist">



                        <input type="hidden" value="{{ $item->id }}" name="itemId">
                        <img src="uploadpic/{{ $item->picture }}" width="150px" height="150px"><br>
                        <h2>{{ $item->name }}</h2>
                        <p>{{ $item->festival }}</p>
                        <p >size:    {{$item->size}}</p>
                        <p>stock:   {{$item->stock}}</p>



                    </div>

                </div>
            @endforeach

        </div>
    </div>
        <div id="modalopen" class="modal" style="display: none" >
            <div class="modal-bg"></div>
            <div class="modal-page">
                <div class="modal-menu">
                <h2>Detail</h2>
                <div class="close" onclick="closemodal()">
                   <i class="fa-solid fa-xmark"></i>
                </div>
               </div>
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div id="modal-list" class="modal-content">
                          
                   </div>
            
             <div class="modal-btn">
           <button class="add-cart">
               Add to cart
           </button>          
           </div>
        </form>
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


</html>

