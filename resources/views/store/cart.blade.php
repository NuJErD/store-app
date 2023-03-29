@if (!Session()->has('user') )
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
    <link rel="stylesheet" href="{{ url('css/cart.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
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
            <h3><a href="{{ route('shop') }}">T - B R A N D</a></h3>
        </div>

        <ul class="menu">


            
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </nav>
   
        
        @if ($orderID)
        
        
        <div class="container-cart">

       
        
            <div class="cart-size">
                
                <div>
                    <h2>MY CART</h2>
                </div>
                @if ($error = Session::get('error'))
                <div class="alerterror">
                   {{$error}}
                </div>
                @endif
                @foreach ($orderde as $item)
                    <div calss="">
                        <div class="">
                            <div class="cart-items">
                                <div class="cart-de">
                                    <img src="../../uploadpic/{{ $item->picture }}" width="100px" height="100px"></img>
                                    
                                    
                                </div>
                                <div class="cart-de">
                                    <p>{{ $item->name }}</p>
                                    <p>ราคาต่อชิ้น:    {{ $item->price }}</p>
                                    <p>Size:    {{ $item->size }}</p>
                                </div>

                                <div class="cart-de-right">
                                    <form action="{{ route('orderup', $item->order_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="decrease" value="decrease">
                                        <input type="hidden" name="p_id" value="{{ $item->id }}">
                                        <button>-</button>
                                    </form>
                                    <input type="text"  value="{{ $item->amount }}" onchange="checkstock(this.value,{{ $item->amount }},{{ $item->id }},{{ $item->order_id }})"> 
                                    <form action="{{ route('orderup', $item->order_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="increase" value="increase">
                                        <input type="hidden" name="p_id" value="{{ $item->id }}">
                                        <button>+</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


            <div class="total">
                {{-- <form action="{{ route('orders.update', $orderID) }}" method="POST"> --}}
                    
                    <div class="" id="totalsum">
                        <script type="text/javascript">
                            total();
                        </script>
                    </div>



                    <div id="total" class="">

                    </div>

                    <br>
                    <div class="checkout">

                         <a href="{{route('checkout.index')}}">
                            <button class="add-cart">
                            checkout
                           
                        </button>
                        </a>
            </div>

      </div>
     
    </div> 
    @endif
    








    @if (!$orderID)
        <div id="CartOpennull" class="container-cart-null">
           
                <div class="cart-null">
                    <div class="null-1">
                         <p>ไม่มีสินค้าในตระกร้า</p>
                        </div>
                   
                    <div class="null-2">
                        <div class="btn-shop">
                            <a href="{{route('shop')}}"><p>ไปหน้าร้านค้า</p></a>
                        </div>
                    </div>
                </div>
         
            
        </div>
    @endif


     <!-- Site footer -->
  <div class="footer-main-xx">
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
</div>
</body>


</html>
