{{-- @if (!Session::has('admin'))
   <script>window.location = "/login";</script>
             
        @endif --}}
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="{{ url('css/style.css') }}">
            <link rel="stylesheet" href="{{ url('css/myorder.css') }}">
            <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
                crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
                 integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        
        </head>
        <script src="../../js/store.js"></script>
        <body>
        <nav>
                <div class ="logo">
                 <h1><a href="{{route('shop')}}">T - B R A N D</a></h1>
                </div>
                
                
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
                            <div class="card-header">Profile Picture</div>
                            <div class="text-center card-body">
                                <!-- Profile picture image-->
                                @if($profile)
                                <img  src="../../uploadpic/uploadpicProfile/{{$profile}}" width="200px" height="200px">
                                 @endif
                                @if(!$profile)
                                <img  src="http://bootdey.com/img/Content/avatar/avatar1.png" width="200px" height="2000px">
                                @endif
                                <!-- Profile picture help block-->
                                <div class="mb-4 small font-italic text-muted">JPG or PNG no larger than 5 MB</div>
                                <!-- Profile picture upload button-->
                                <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                <label for="upload">
                                   
                                <span class="btn btn-primary" type="button"> Upload new image</span>
                                <input type="file" id="upload" name="picture" style="display:none">
                                </label>
                            </div>
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
                            @endif
                            
                            <div class="card-body" id="card-body-detail">
                                
                                
                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="mb-1 small" for="inputUsername">Username</label>
                                        <input class="form-control" name="username" type="text" placeholder="Enter your username" value="{{$user->username}}">
                                    </div>
                                    <!-- Form Row-->
                                    <div class="mb-3 row gx-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >First name</label>
                                            <input class="form-control" name="firstname" type="text" placeholder="Enter your first name" value="{{$user->firstname}}">
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >Last name</label>
                                            <input class="form-control" name="lastname" type="text" placeholder="Enter your last name" value="{{$user->lastname}}">
                                        </div>
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="mb-3 row gx-3">
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >Phone</label>
                                            <input class="form-control" name="phonenumber" type="text" placeholder="Enter your Phone" value="{{$user->phonenumber}}">
                                        </div>
                                        <!-- Form Group (location)-->
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >Address</label>
                                            <input class="form-control" name="address" type="text" placeholder="Enter your Address" value="{{$user->address}}">
                                        </div>
                                    </div>
                                     {{-- Form Group (email address) --}}
                                    <div class="mb-3">
                                        <label class="mb-1 small" >Email address</label>
                                        <input class="form-control" name="Email" type="email" placeholder="Enter your email address" value="{{$user->email}}">
                                    </div> 
                                    <!-- Form Row-->
                                    <div class="mb-3 row gx-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >City</label>
                                            <input class="form-control" name="city" type="tel" placeholder="Enter your phone city" value="{{$user->city}}">
                                        </div>
                                        <!-- Form Group (birthday)-->
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >Region</label>
                                            <input class="form-control" name="region" type="tel" placeholder="Enter your region" value="{{$user->region}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-1 small" >Postcode</label>
                                            <input class="form-control" name="postcode" type="tel" placeholder="Enter your phone number" value="{{$user->postcode}}">
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                   
                                    <button class="btn btn-danger"  > <a href="{{route('logout')}}" >Log Out</a></button>
                                </form>
                                <button class="btn btn-warning" onclick="changePW_add()" > Change Password</button>
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