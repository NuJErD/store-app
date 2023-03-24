
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>

<body>
    <nav>
        <div class="logo">
        <h1><a href="shop">T - B R A N D</a></h1>
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
            <p>First name</p>
            <input type="text" class=textbox name="firstname" required>
            <p>Last name</p>
            <input type="text" class=textbox name="lastname" required>
            <p>Phone number</p>
            <input type="text" class=textbox name="phonenumber" required>
            <p>Username</p>
            <input type="text" class=textbox name="username" required>
            <p>Password</p>
            <input type="password" class=textbox name="password" required>
            <p>Comfirm password</p>
            <input type="text" class=textbox name="c_password" required>
            <div class="head">
                <hr>
                <p>Address</p>
                <hr>

            </div>
            <p>Address</p>
            <input type="text" class=textbox name="address" required>
            <p>Region</p>
            <input type="text" class=textbox name="region" required>
            <p>City</p>
            <input type="text" class=textbox name="city" required>
            <p>Postcode</p>
            <input type="text" class=textbox name="postcode" required>
            <br>
            <br>
            <p>Profile Picture:<input type="file" class="" name="picture"></p>
           
            <br>
            <input class=btn-submit type=submit name="signup" value="Sign UP">
            
    </div>
        </form>
        
        
</body>
<footer>

</footer>

</html>