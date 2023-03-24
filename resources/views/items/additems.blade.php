@if (!Session::has('admin'))
   <script>window.location = "/login";</script>
             
        @endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    
    <title>Document</title>
</head>
<body> 
<nav>
        <div class ="logo">
         <h1><a href="{{route('items.index')}}">T - B R A N D</a></h1>
        </div>
    </nav>
<div id="frame">
    <div class="menu">
        <ul class="navadmin">
        <li>
        <a href>จัดการร้านค้า</a>
        </li>
        <li>
        <a href>คำสั่งซื้อ</a> </li>
       
       
    </ul>
        
    </div>
    <div class="additems">
             
    
        
        <form class="additems" action="{{route('items.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
         <h1>เพิ่มข้อมูล</h1> 
        <div class="inputtext">
        <div>
            <p>Name:</p>
            <input type="text" class="textboxadd" name="name" required>
        </div>
        <div><p>Festival:</p>
            <input type="text" class="textboxadd" name="festival" required>
        </div>  
        </div> 
        <div class="inputtext">
        <div>
            <p>Price:</p>
            <input type="text" class="textboxadd" name="price" required>
        </div>
        <div><p>Brand:</p>
            <input type="text" class="textboxadd" name="brand" required>
        </div>  
        </div> 
        <div class="inputtext">
        <div>
            <p>Size:</p>
            <select name="size">
                <option value="S" >S</option>
                <option value="M" >M</option>
                <option value="L" >L</option>
                <option value="XL" >XL</option>
            </select>
            
        </div>
        <div>
            <p>Chest:</p>
            <input type="text" class="textboxaddmin" name="chest" required>
        </div>
        <div>
            <p>Lenght:</p>
            <input type="text" class="textboxaddmin" name="lenght" required>
        </div>
        <div>
            <p>Color:</p>
            <input type="text" class="textboxaddmin" name="color" required>
        </div> 
        <div>
            <p>Stock:</p>
            <input type="number" class="textboxaddmin" name="stock" required>
        </div> 
       
        </div> 
        <input type="file" class="bt-file" name="picture" required>
        <input type="submit" value="เพิ่มสินค้า" class="btn-submitadd" name="items">
        </form>
 </div>
</div>
    
</body>
</html>