@if (!Session::has('admin'))
   <script>window.location = "/login";</script>
             
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <title>Document</title>
</head>
<body> 
    <nav class="px-4 py-0 navbar">
        <div class ="logo">
         <h3 class="mb-0"><a href="{{route('items.index')}}">T-BRAND</a></h3>
        </div>
        <ul class="mb-0 menu">
        
        
     </ul>
        
    </nav>

    <div class="menu" style="height: 125vh">
        <ul class="navadmin">
            <a href="{{route('items.index')}}"><li>จัดการสินค้า  </li> </a>
          
            <a href="{{route('orders.index')}}">
            <li>จัดการคำสั่งซื้อ</li></a>
            <a href="{{route('brand.index')}}"><li>จัดการแบรนด์สินค้า  </li> </a>
            <a href="{{route('logout')}}"><li>ออกจากระบบ</li></a>
       
       
    </ul>
        
    </div>
    <div class="additems">
      
        <div class="mt-2 col-xl-4">
            @if($error = Session::get('error'))
            <div class="alert alert-danger" id="errorpassword"  >
                  {{$error}}
           </div>
         @endif  
            <!-- Profile picture card-->
            <div class="mb-4 card">
                <div class="card-header"><h4>เพิ่มข้อมูลสินค้า</h4></div>
                <div class="card-body">
                    <form class="was-validated" action="{{route('items.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                     
                    <div class="inputtext">
                        <div class="col-md-5">
                            
                    
                            <div class="inputtext-de">
                                <label class="d-flex"><p>Name <div class="check-value">**</div></p></label>
                                <input type="text" class="form-control " name="name"  required>
                                
                            </div>
                    
                       
                        
                    
                    
                </div>
                <div class="col-md-5">
                    <div class="inputtext-de">
                        <label class="d-flex"><p>Festival <div class="check-value" >**</div></p></label>
                        <input type="text" class="form-control " name="festival" required>
                        
                    </div>  
                </div>
                    </div> 
                    <div class="inputtext">
                        <div class="col-md-5">
                    <div class="inputtext-de">
                      <label class="d-flex"> <p>Price <div class="check-value" >**</div></p></label> 
                        <input type="number" class="form-control " name="price" step="0.1" min="0" required>
                        
                    </div >
                </div>
                <div class="col-md-5">
                    <label class="d-flex"><p style="margin: 0%">Brand <div class="check-value" >**</div></p></p></label>
                    
                    <select class="form-select" name="brand" required >
                      <option value=""> Select Brand</option>
                      @foreach($brand as $b)
                      <option value="{{$b->name}}">{{$b->name}}</option>
                      @endforeach
                    </select>
                
                   
                  </div>
                    </div> 
                    
                        <div class="mb-3">
                            <label class="d-flex"><p style="margin: 0%">Size <div class="check-value" >**</div></p></label>
                            
                            <select class="form-select" name="size" required >
                              <option value=""> Select Size</option>
                              <option value="S">S</option>
                              <option value="M">M</option>
                              <option value="L">L</option>
                              <option value="XL">XL</option>
                            </select>
                        
                            
                          </div>
                     <div class="inputtext">    
                         <div class="col-md-5">
                            <div class="inputtext-de">
                                <label class="d-flex"><p>Chest <div class="check-value" >**</div></p></label>
                                <input type="text" class="form-control " name="chest" min="0" required>
                                  
                            </div>
                    </div>
                       
                    <div class="col-md-5">
                        <div class="inputtext-de">
                            <label class="d-flex"><p>Lenght <div class="check-value" >**</div></p></label> 
                        <input type="text" class="form-control " name="lenght" required>
                        
                        </div>
                    </div>
                </div>
                <div class="inputtext">
                    <div class="col-md-5">
                        <div class="inputtext-de">
                            <label class="d-flex"><p>Color <div class="check-value" >**</div></p></label>
                        <input type="text" class="form-control " name="color" required>
                        
                        </div>
                    </div> 
                    <div class="col-md-5">
                        <div class="inputtext-de">
                            <label class="d-flex"><p>Stock <div class="check-value" >**</div></p></label>
                        <input type="number" class="form-control " name="stock" min="0" required>
                        
                        </div>
                    </div> 
                </div>
                    
                    <label class="d-flex"><p>Picture <div class="check-value" >**</div></p></label>
                    <input type="file" class="form-control " name="picture" required>
                    <div class="mt-2" style="color:#dc3545">**กรุณากรอกข้อมูล</div>
                    
                    <a href="{{route('items.index')}}"><input type="button" value="ยกเลิก" class="btn-cancel" name="items"></a>
                    <input type="submit" value="ยืนยัน" class="btn-submitadd" name="items">
                    
                
                    </form>
                </div>
            </div>
        </div>
        
       
 </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>