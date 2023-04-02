
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="js/checkregister.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>

<body>
    <nav class="px-4 py-0 navbar">
        <div class="logo">
        <h3><a href="shop">T - B R A N D</a></h3>
        </div>

        <ul class="menu">
           
           
        </ul>
    </nav>

    <div class="register" >
      
        <form class="was-validated" action="{{route('register.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            
            <div class="d-flex justify-content-center" >
              @if ($error = Session::get('error'))
              <div class="alert alert-danger">
                 {{$error}}
              </div>
              @endif
              </div> 
            
              <div class="d-flex justify-content-center">
                
                <div class="me-5" style="width: 35%">
                 <div class="mt-4 mb-4 card" >
                <div class="card-header"><h4>สร้างบัญชี</h4></div>
                <div class="card-body" >
                                
                                
                  <!-- Form Group (username)-->
                  <div class="mb-3">
                      <label class="mb-1 small">ขื่อผู้ใช้งาน</label>
                      <input id="username" class="form-control" name="username" type="text" placeholder="ชื่อผู้ใช้งาน" onkeyup="checkuser(this.value)" required>
                      <div id="usercheck-feed" class="invalid-feedback">กรุณากรอกข้อมูล</div>
                      <div id="usercheck"  style="color:#dc3545"></div>
                      
                  </div>
                  <!-- Form Row-->
                  <div class="mb-3 row gx-3">
                      <!-- Form Group (first name)-->
                      <div class="col-md-6">
                          <label class="mb-1 small" >ชื่อ</label>
                          <input class="form-control" name="firstname" type="text" placeholder="ชื่อ"required >
                          <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                      
                      </div>
                      <!-- Form Group (last name)-->
                      <div class="col-md-6">
                          <label class="mb-1 small" >นามสกุล</label>
                          <input class="form-control" name="lastname" type="text" placeholder="นามสกุล" required>
                          <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                      </div>
                  </div>
                  <!-- Form Row        -->
                  <div class="mb-3 row gx-3">
                    <div class="col-md-6">
                      <label class="mb-1 small" >รหัสผ่าน</label>
                      <input id="password" class="form-control" name="password" type="password" aria-describedby="passwordHelpBlock" placeholder="รหัสผ่าน" onkeyup="checkpassword(this.value); cfpassword(document.getElementById('passwordcf').value)"  required>
                      <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                      <div id="password-feed"  style="color:#dc3545"></div>
                  </div>
                  <div class="col-md-6">
                    <label class="mb-1 small" >ยืนยันรหัสผ่าน</label>
                    <input  id="passwordcf" class="form-control" name="c_password" type="password" placeholder="ยืนยันรหัสผ่าน" onkeyup="cfpassword(this.value)" required>
                    <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                    <div id="passwordcf-feed"  style="color:#dc3545"></div>
                </div>
                      
                     
                      
                  </div>
                   
                  <!-- Form Row-->
                  <div class="mb-3 row gx-3">
                      <!-- Form Group (phone number)-->
                      <div class="col-md-6">
                        <label class="mb-1 small" >เบอร์โทร</label>
                        <input class="form-control" name="phonenumber" type="text" placeholder="เบอร์โทร" required>
                        <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                    </div>
                    <p>Picture</p>
                    <input type="file" class="form-control " name="picture" >
                      <!-- Form Group (birthday)-->
                   
                  </div>
                </div>
                 </div>
                </div>
                 
                  <!-- Save changes button-->
                  <div class="" style="width: 30%;">
                  <div class="mt-4 mb-4 card">
                  <div class="card-header"><h4>เพิ่มที่อยู่</h4></div>
                  <div class="card-body" >
                                
                                
                    <!-- Form Group (username)-->
                    <div class="mb-3">
                        <label class="mb-1 small" >ที่อยู่</label>
                        <input class="form-control" name="address" type="text" placeholder="ที่อยู่" required>
                        <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                    </div>
                    <!-- Form Row-->
                    <div class="mb-3 row gx-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="mb-1 small" >จังหวัด</label>
                            <input class="form-control" name="region" type="text" placeholder="จังหวัด" required>
                            <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="mb-1 small" >อำเภอ</label>
                            <input class="form-control" name="city" type="text" placeholder="อำเภอ"  required>
                            <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                        </div>
                    </div>
                    <!-- Form Row        -->
                    <div class="mb-3 row gx-3">
                        <!-- Form Group (organization name)-->
                        <div class="col-md-6">
                            <label class="mb-1 small" >รหัสไปรษณีย์</label>
                            <input class="form-control" name="postcode" type="text" placeholder="รหัสไปรษณีย์" required>
                            <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                        </div>
                    
                     
                    </div>
                     
                    <!-- Form Row-->
                         
                  </div>
                  </div>
                  <div class="d-flex ">
                    <button class="btn btn-dark" type="submit">สมัครสมาชิก</button>
                  </div>
                  </div>
        </div>
        </form>
           
      
             {{-- <div class="">
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
           
               

            </div>
            <div class="">
             
             
             
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
          </div>
            <br>
             --}}  
            
   
    {{-- <input class=btn-submit type=submit name="signup" value="Sign UP">   --}}
  </form> 
  </div>  

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
          <!-- Site footer -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>


</html>