
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>

<body>
    <nav class="navbar">
        <div class="logo">
        <h3><a href="shop">T - B R A N D</a></h3>
        </div>

        <ul class="menu">
            image.png
           
        </ul>
    </nav>

    <div class="register">

        <form class="register" action="{{route('register.store')}}" method="POST">
            @csrf
          
            <h1>Sign up</h1>

            <div class="head">
                <hr>
                <p>Information</p>
                <hr>

            </div>
          
             @if ($error = Session::get('error'))
             <div class="alert alert-danger">
                {{$error}}
             </div>
             @endif
            <p class="greyy">First name</p>
            <input type="text" class=textbox name="firstname" required>
            <p class="greyy">Last name</p>
            <input type="text" class=textbox name="lastname" required>
            <p class="greyy">Phone number</p>
            <input type="text" class=textbox name="phonenumber" required>
            <p class="greyy">Username</p>
            <input type="text" class=textbox name="username" required>
            <p class="greyy">Password</p>
            <input type="password" class=textbox name="password" required>
            <p class="greyy">Comfirm password</p>
            <input type="text" class=textbox name="c_password" required>
            <div class="head">
                <hr>
                <p>Address</p>
                <hr>

            </div>
            <p class="greyy">Address</p>
            <input type="text" class=textbox name="address" required>
            <p class="greyy">Region</p>
            <input type="text" class=textbox name="region" required>
            <p class="greyy">City</p>
            <input type="text" class=textbox name="city" required>
            <p class="greyy">Postcode</p>
            <input type="text" class=textbox name="postcode" required>
            <br>
            <br>
            <p class="greyy">Profile Picture:<input type="file" class="" name="picture"></p>
           
            <br>
            <input class=btn-submit type=submit name="signup" value="Sign UP">
            
    </div>
        </form>
        
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