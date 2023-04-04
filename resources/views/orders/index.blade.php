@if (!Session::has('admin'))
   <script>window.location = "/login";</script>
             
        @endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="js/store.js"></script>
       
       
</head>
<body>
<nav class="px-4 py-0 navbar">
        <div class ="logo">
         <h3 class="mb-0"><a href="{{route('store.index')}}">T - B R A N D</a></h3>
        </div>
        <ul class="menu">
        
         <li><a href="{{route('logout')}}">Logout</a></li>
     </ul>
        
    </nav>

    
    <div id="frame">
        <div class="menu">
            <ul class="navadmin">
            
            <a href="{{route('items.index')}}"><li>จัดการสินค้า </li> </a>
          
            <a href="{{route('orders.index')}}">
            <li>จัดการคำสั่งซื้อ</li></a>
            <a href="{{route('brand.index')}}"><li>จัดการแบรนด์สินค้า  </li> </a>
            <a href="{{route('logout')}}"><li>ออกจากระบบ</li></a>
       
            
            
           
           
        </ul>
            </div>
            
        </div>  
        
        <div class="order">
     <table class="table table-bordered table-hover">
      <div class="my-3 col-md-2">
        <div class="rounded input-group custom2">
            <input type="search" class="rounded form-control custom2" placeholder="ค้นหาคำสั่งซื้อ" aria-label="Search" aria-describedby="search-addon" onkeyup="searchorder(this.value)" />
            
          </div>
   </div>
   <thead class="table-dark">
    @if($error = Session::get('error'))
    <div class="alert alert-danger" id="errorpassword"  >
          {{$error}}
   </div>
 @endif 
       <tr>
        <th><h5>เลขคำสั่งซื้อ</h5></th>
        <th><h5>เลขพัสดุ</h5></th>
        <th><h5>วันที่สั่งซื้อ</h5></th>
        <th><h5>ชื่อลูกค้า</h5></th>
        <th><h5>ที่อยู่จัดส่ง</h5></th>
        <th><h5>จำนวนเงิน</h5></th>
        
        
        <td><h5>สถานะ</h5></td>
        <td><h5>สลิป</h5></td>
     </tr>
    </thead>
       
      
        
       <tbody id="order-detail">
    
        @foreach($order as $or)
            <tr>
            
            <td id ="ornum{{$or->id}}"> {{$or->ordernumber}}   </td>
        
            <td id='input-tracking{{$or->id}}' style="width: 250px">
                
                <div class="input-tracking{{$or->id}}" >
                     <div class="input-tracking">
                @if($or->tracking != '-')
                <button type="button" class="btn btn-info" onclick="showtrack('{{$or->tracking}}')">กดดู</button>
                @else
                   {{$or->tracking}} 
                @endif
                     </div>
               </div>
               <form  action="{{route('addtrack',$or->id)}}" class="was-validated"  method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div id="tracking{{$or->id}}">

                </div>
                 {{-- <button type="button" class="btn btn-warning"><input type="file">แก้ไข</button> --}}
                </form>
                </td>
            
        
            <td> {{$or->created_at}}   </td>
            <td> {{$or->firstname}} &nbsp; {{$or->lastname}}  </td>
            <td> {{$or->address}} &nbsp; ต.{{$or->district}} &nbsp; จ.{{$or->province}}  </td>
            <td> {{$or->total}}       </td>
           
            <td>
                {{-- <select id="status{{$or->id}}" onchange="updatestatus('{{$or->id}}')">
                <option value="{{$or->status}}">{{$or->detail}}</option>
                @if($or->status == '1' ) 
                <option value="2">จัดส่งแล้ว</option>
                @endif
                @if($or->status == '2' ) 
                <option value="3">ได้รับสินค้าเรียบร้อย</option>
                @endif --}}
                {{$or->detail}}
            
               
                
                </select>
            </td>
            
            <td>
                <div class="d-flex justify-content-around">
            {{$or->updated_at}}&nbsp; 
            
               
             <div class="">
         
            <button type="button" class="btn btn-info" onclick="showslip('{{$or->slip}}')">สลิป</button>
            <button type="button" class="btn btn-warning" onclick="tracking('{{$or->id}}')">แก้ไข</button>
            <button type="button" class="btn btn-success" onclick="getorder_detail('{{$or->id}}')">รายละเอียด</button>
        </div> 
     </div>
        </td>
        
        </tr>
        @endforeach     
       
      </tbody>
    
    </table>
    {{ $order->links('pagination::bootstrap-4') }}
        </div>
        <div  class="slip" style="display:  none" >
            <div class="modal-bg"></div>
            <div class="modal-page">
                <div class="modal-menu justify-content-end">
                 
                <div class="close" onclick="closemodalslip()">
                   <i class="fa-solid fa-xmark"></i>
                </div>
               </div>
               
                   <div class="slippic"></div>
            
           
        
        </div>
    </div>
    
    <div  class="order-ad" style="display:none  " >
        <div class="modal-bg"></div>
        <div class="modal-page-ad">
            <div class="modal-menu ">
             <div > <h3 class="ordernumber"></h3></div>
            <div class="close" onclick="closemodalorder()">
               <i class="fa-solid fa-xmark"></i>
            </div>
           </div>
           
               <div class="order-ad-de" ></div>
        
               <div class="myorder-total" >
                <p class="total-ad"></p>
              </div>
    
    </div>
</div>
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>