@if (Session::has('user'))
   <script>window.location = "/shop";</script>
             
        @endif

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
   
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" >

</head>
<script src="js/store.js"></script>

<body>
    <nav class="navbar" >
        <div class="logo">
            <h3><a href="store">T - B R A N D</a></h3>
        </div>

        <ul class="menu" >     
        <li><a href="login"><p style="color: white">Login</p></a></li>
        <li><a href="register"><p style="color: white">Sign up</p></a></li>
        </ul>
    </nav>
    <div class="container-shop">
        <div class="menu-item">
          <input type="text" class="sidebar-serch" placeholder="Serch" onkeyup="search(this.value)">
          <br><br>
          <h1>Brands</h1>
          <div class="" >
            <li class="list-brand"  onclick="search()">ALL</li>
            @foreach($brand as $b)
              <li class="list-brand" onclick="search('{{$b->name}}')" >{{$b->name}}</li>
            @endforeach
        </div>


            </ul>

        </div>
        <div class="items">
           
            @foreach ($products as $item)
                <div class="itemslist" onclick="myFunction('{{ $item->id }}')">

                    <div class="itemslist">



                        <input type="hidden" value="{{ $item->id }}" name="itemId">
                        <img src="uploadpic/product/{{ $item->picture }}" width="150px" height="150px"><br>
                        <h2>{{ $item->name }}</h2>
                        <p>{{ $item->festival }}</p>
                        <p >Size:    {{$item->size}}</p>
                        <p>Stock:   {{$item->stock}}</p>



                    </div>

                </div>
            @endforeach

        </div>

        <div id="modalopen-store" class="modal" style="display: none" >
            <div class="modal-bg"></div>
            <div class="modal-page">
                <div class="modal-menu">
                <h2>Detail</h2>
                <div class="close" onclick="closemodal()">
                   <i class="fa-solid fa-xmark"></i>
                </div>
               </div>
                <form action="{{ route('login.index') }}" >
                    
                    <div id="modal-list-store" class="modal-content">
                          
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