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
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
    <title>Document</title>
</head>
<body> 
<nav class="navbar">
        <div class ="logo">
         <h3><a href="{{route('items.index')}}">T - B R A N D</a></h3>
        </div>
    </nav>
<div id="frame">
    <div class="menu">
        <ul class="navadmin">
        <li>
        <a href="{{route('items.index')}}">จัดการร้านค้า</a>
        </li>
        <li>
        <a href="{{route('orders.index')}}">คำสั่งซื้อ</a> </li>
       
       
    </ul>
        
    </div>
    <div class="additems">
       
        <div class="col-xl-4 mt-2">
            <!-- Profile picture card-->
            <div class="mb-4 card">
                <div class="card-header"><h4>เพิ่มข้อมูลสินค้า</h4></div>
                <div class="card-body">
                    <form class="was-validated" action="{{route('items.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                     
                    <div class="inputtext">
                        <div class="col-md-5">
                            
                    
                            <div class="inputtext-de">
                                <p>Name</p>
                                <input type="text" class="form-control " name="name"  required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                    
                       
                        <div class="invalid-feedback">Please fill out this field.</div>
                    
                    
                </div>
                <div class="col-md-5">
                    <div class="inputtext-de">
                        <p>Festival</p>
                        <input type="text" class="form-control " name="festival" required>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>  
                </div>
                    </div> 
                    <div class="inputtext">
                        <div class="col-md-5">
                    <div class="inputtext-de">
                        <p>Price</p>
                        <input type="number" class="form-control " name="price" step="0.1" min="0" required>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div >
                </div>
                <div class="col-md-5">
                    <p style="margin: 0%">Brand</p>
                    
                    <select class="form-select" name="brand" required >
                      <option value=""> Select Brand</option>
                      @foreach($brand as $b)
                      <option value="{{$b->name}}">{{$b->name}}</option>
                      @endforeach
                    </select>
                
                    <div class="invalid-feedback"> invalid select </div>
                  </div>
                    </div> 
                    
                        <div class="mb-3">
                            <p style="margin: 0%">Size</p>
                            
                            <select class="form-select" name="size" required >
                              <option value=""> Select Size</option>
                              <option value="S">S</option>
                              <option value="M">M</option>
                              <option value="L">L</option>
                              <option value="XL">XL</option>
                            </select>
                        
                            <div class="invalid-feedback"> invalid select </div>
                          </div>
                     <div class="inputtext">    
                         <div class="col-md-5">
                            <div class="inputtext-de">
                                  <p>Chest:</p>
                                <input type="text" class="form-control " name="chest" min="0" required>
                                <div class="invalid-feedback">Please fill out this field.</div>  
                            </div>
                    </div>
                       
                    <div class="col-md-5">
                        <div class="inputtext-de">
                        <p>Lenght</p>
                        <input type="text" class="form-control " name="lenght" required>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                </div>
                <div class="inputtext">
                    <div class="col-md-5">
                        <div class="inputtext-de">
                        <p>Color</p>
                        <input type="text" class="form-control " name="color" required>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div> 
                    <div class="col-md-5">
                        <div class="inputtext-de">
                        <p>Stock</p>
                        <input type="number" class="form-control " name="stock" min="0" required>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div> 
                </div>
                    
                    <p>Picture</p>
                    <input type="file" class="form-control " name="picture" required>
                    <div class="invalid-feedback">Please fill out this field.</div>
                
                    <input type="submit" value="เพิ่มสินค้า" class="btn-submitadd" name="items">
            
                
                    </form>
                </div>
            </div>
        </div>
        
       
 </div>
</div>
    
</body>
</html>