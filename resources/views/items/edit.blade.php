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
        <div class="logo">
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
                    <a href>คำสั่งซื้อ</a>
                </li>
                <li>
                    <a href class="btn-submit">สนทนา</a>
                </li>

            </ul>

        </div>
        <div class="additems">



            <form class="additems" action="{{route('items.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h1>แก้ไขข้อมูล</h1>
                <div class="inputtext">
                    <div>
                        <p>Name:</p>
                        <input type="text" class="textboxadd" name="name" value="{{$item->name}}" required>
                    </div>
                    <div>
                        <p>Festival:</p>
                        <input type="text" class="textboxadd" name="festival" value="{{$item->festival}}" required>
                    </div>
                </div>
                <div class="inputtext">
                    <div>
                        <p>Pice:</p>
                        <input type="text" class="textboxadd" name="price" value="{{$item->price}}" required>
                    </div>
                    <div>
                        <p>Brand:</p>
                        <input type="text" class="textboxadd" name="brand" value="{{$item->brand}}" required>
                    </div>
                </div>
                <div class="inputtext">
                    <div>
                        <p>Size:</p>
                        <input type="text" class="textboxaddmin" name="size" value="{{$item->size}}" required>
                    </div>
                    <div>
                        <p>Chest:</p>
                        <input type="text" class="textboxaddmin" name="chest" value="{{$item->chest}}" required>
                    </div>
                    <div>
                        <p>Lenght:</p>
                        <input type="text" class="textboxaddmin" name="lenght" value="{{$item->lenght}}" required>
                    </div>
                    <div>
                        <p>Color:</p>
                        <input type="text" class="textboxaddmin" name="color" value="{{$item->color}}" required>
                    </div>
                    <div>
                        <p>Stock:</p>
                        <input type="text" class="textboxaddmin" name="stock" value="{{$item->stock}}" required>
                    </div>
                    

                </div>
               
                <br>
                <img src="../../uploadpic/{{$item->picture}}" width="100px" height="100px" >
                
                <input type="file" class="bt-file" name="picture">

                <input type="submit" value="บันทึกสินค้า" class="btn-submitadd" name="edit_items">
            </form>
        </div>
    </div>

</body>

</html>