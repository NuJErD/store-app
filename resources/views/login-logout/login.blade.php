
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>
<body>
    <nav class="px-4 py-0 navbar">
        <div class ="logo">
         <h3><a href="{{route('store.index')}}">T - B R A N D</a></h3>
        </div>

        <ul class = "menu">
            
           
        </ul>
    </nav>
<div class="login">
        <form class="login"  action="{{route('logincheck')}}" method="POST">
        @csrf
      
        @if($error = Session::get('error'))
        <div class="alert alert-danger"  >
            {{$error}}
         </div>
        @endif
       <h1>Log in</h1>
       <p class="mb-0">Username</p>
       <input class="textbox" type="text" name="username" required >
       <p class="mb-0">Password</p>
       <input class="textbox" type="password" name="password" required>
       
       
         

        <div class="forgot">
           
        
    </div>
        
       
       <input class="btn-submit" type="submit" value="Login" name="login">
       <label class="sign">Don't have an account yet? &nbsp;<a href="register">Sign up</a></label>

    
       
    </form>
</div>
    
</body>
<footer>
    
</footer>
</html>