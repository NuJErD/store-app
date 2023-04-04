@if (!Session::has('user'))
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
            <link rel="stylesheet" href="{{ url('css/myorder.css') }}">
            <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
                crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
                 integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <link rel="stylesheet" href="{{ url('css/style.css') }}">
        
        </head>
        <script src="../../js/store.js"></script>
        <script src="../../js/checkregister.js"></script>
        <body>
        <nav class="px-4 py-0 navbar">
                <div class ="logo">
                 <h3 class="mb-0"><a href="{{route('shop')}}">T-BRAND</a></h3>
                </div>
                <ul class="menu">


            
                    <li><a href="{{ route('shop') }}">Home</a></li>
                </ul>
                
            </nav>
            <div class="items">
                {{-- @if ($error = Session::get('errorpassword'))
                <div class="alert alert-danger" id="errorpassword" >
                   {{$error}}
                </div>
                @endif --}}
            <div class="px-4 mt-5 container-xl">
                <!-- Account page navigation-->
                
                
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="mb-4 card mb-xl-0">
                            <form class="was-validated" action="{{route('editpic',$user->id)}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method("PUT")
                            <div class="card-header">Profile Picture</div>
                            <div class="text-center card-body">
                                <!-- Profile picture image-->
                                @if($profile)
                                <img  src="../../uploadpic/uploadpicProfile/{{$profile}}" width="200px" height="200px">
                                 @endif
                                @if(!$profile)
                                <img  src="http://bootdey.com/img/Content/avatar/avatar1.png" width="200px" height="200px">
                                @endif
                                <!-- Profile picture help block-->
                                <div class="mb-4 small font-italic text-muted"></div>
                                <!-- Profile picture upload button-->
                                <label class="" id="newpic" >
                                </label> 
                                <label for="upload">
                                 
                                <span  id="editupload" class="btn btn-primary"  type="button">อัปโหลดรูป</span>
                                
                                
                                <input type="file" id="upload" name="picture" style="display:none" onchange="editpic()" >
                                </label>
                                <label >
                                    
                                    <span id="deletepic" class="btn btn-danger"  type="button" onclick="deletepic('{{$user->picture}}')">ลบรูป</span>
                                   
                                    </label>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="mb-4 card">
                            
                            <div class="card-header">Account Details</div>
                            @if ($error = Session::get('success'))
                            <div class="alert alert-success" id="errorpassword"  >
                               {{$error}}
                            </div>
                            @elseif($error = Session::get('error'))
                            <div class="alert alert-danger" id="errorpassword"  >
                                {{$error}}
                             </div>
                            @endif
                           
                               
                           
                            
                            
                            <div class="card-body" id="card-body-detail">
                                <form class="was-validated" action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    @method("PUT")
                                
                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="mb-1 small" for="inputUsername">ชื่อผู้ใช้งาน</label>
                                        <input class="form-control" style="display:none" name="username" type="text" placeholder="Enter your username" value="{{$user->username}}" onkeyup="checkuserEdit(this.value)" required>
                                        <div id="usercheckedit"  style="color:#dc3545"></div>
                                        <p class="showedit">{{$user->username}}</p>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="mb-3 row gx-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >ชื่อ</label>
                                            <p class="showedit">{{$user->firstname}}</p>
                                            <input class="form-control" style="display:none" name="firstname" type="text" placeholder="Enter your first name" value="{{$user->firstname}}">
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >นามสกุล</label>
                                            <p class="showedit">{{$user->lastname}}</p>
                                            <input class="form-control" style="display:none" name="lastname" type="text" placeholder="Enter your last name" value="{{$user->lastname}}">
                                        </div>
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="mb-3 row gx-3">
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >เบอร์โทร</label>
                                            <p class="showedit">{{$user->phonenumber}}</p>
                                            <input class="form-control" style="display:none" name="phonenumber" type="text" placeholder="Enter your Phone" value="{{$user->phonenumber}}">
                                        </div>
                                        <!-- Form Group (location)-->
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >ที่อยู่</label>
                                            <p class="showedit">{{$user->address}}</p>
                                            <input class="form-control" style="display:none" name="address" type="text" placeholder="Enter your Address" value="{{$user->address}}">
                                        </div>
                                    </div>
                                     
                                    <!-- Form Row-->
                                    <div class="mb-3 row gx-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >จังหวัด</label>
                                            <p class="showedit">{{$user->province}}</p>
                                            <input class="form-control" style="display:none" name="province" type="tel" placeholder="Enter your province" value="{{$user->province}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >อำเภอ</label>
                                            <p class="showedit">{{$user->district}}</p>
                                            <input class="form-control" style="display:none" name="district" type="tel" placeholder="Enter your phone district" value="{{$user->district}}">
                                        </div>
                                        <!-- Form Group (birthday)-->
                                       
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >รหัสไปรษณีย์</label>
                                            <p class="showedit">{{$user->postcode}}</p>
                                            <input class="form-control" style="display:none" name="postcode" type="tel" placeholder="Enter your phone number" value="{{$user->postcode}}">
                                        </div>
                                        
                                    </div>
                                    <!-- Save changes button-->
                                    <div class="b-all d-flex ">
                                        <div class="SaveEdit">
                                    <button class="btn btn-primary me-1" type="botton" onclick="AddSavebtn()">แก้ไขโปรไฟล์</button>
                                </div>
                            </form>    
                                
                                    <div class="">
                                <button class="btn btn-warning" onclick="changePW_add()" > เปลี่ยนรหัสผ่าน</button>    
                                <button class="btn btn-danger"  > <a href="{{route('logout')}}" >ออกจากระบบ</a></button>
                                </div>
                            </div>
                       
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
       
            
   
         
         
        
        </body>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        </html>