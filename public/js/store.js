


function myFunction(id) {
    $("#modalopen").css('display', 'flex')
    $("#modalopen-store").css('display', 'flex')
    var $id = id
    
    //;
    $.ajax({
        
        url: '/modal/'+id,
        type: 'get',        
        dataType: 'json',
        success: function (response) {
            // $('#modal-list').empty();        
            var data = response.data[0];
            
            console.log(response)

            var detail = '';
            detail += `<div class="modal-content">
        <img src="../../uploadpic/product/${data.picture}" width="200px" height="200px" ></img>
        
        <div class="modal-detail"> 
        <input type="hidden"  name="color" value="${data.color}" >
        <input type="hidden"  name="lenght" value="${data.lenght}" >
        <input type="hidden"  name="chest" value="${data.chest}" >
        <input type="hidden"  name="size" value="${data.size}" >
        <input type="hidden"  name="brand" value="${data.brand}" >
            <input type="hidden"  name="price" value="${data.price}" >
            <input type="hidden"  name="id" value="${data.id}" >
            <input type="hidden"  name="festival" value="${data.festival}" >
            <input type="hidden"  name="name" value="${data.name}" > 
          <div> 
          <h4><p class="text-modal">Name:     </p> <h4> 

         <h4> <p class="text-modal">Festival: </p></h4>
         
         <h4> <p class="text-modal">Price:     </p> </h4>
         
         <h4> <p class="text-modal">Brand:   </p></h4>
          
         <h4> <p class="text-modal">Size:     </p></h4>
        
         <h4> <p class="text-modal">Chest:    </p></h4>
         
        <h4>  <p class="text-modal">Lenght:   </p></h4>
         
        <h4> <p class="text-modal">Color:    </p></h4>
          </div>
          <div class="modal-i-de">
          <p>${data.name}</p>
          <p>${data.festival}</p>
          <p>${data.price}THB</p>
          <p>${data.brand}</p>
          <p>${data.size}</p>
          <p>${data.chest}</p>
          <p>${data.lenght}</p>
          <p>${data.color}</p>
          </div>  
           
            
                    
        </div>        
    </div> `
            $("#modal-list").html(detail)
            $("#modal-list-store").html(detail)
        }
    });
}

function OpenCartnull() {
    $("#CartOpennull").css('display', 'flex')
}


function total() {
   
    var total = 0
    $.ajax({
        
        url: 'cartget',
        type: 'get',
        dataType: 'json',
        success: function (response) {
        
            console.log(response)
            var data = response.data
            //var length = lenght     
            
            var total2 = ''
            // var checkout = ''
            var count = Object.keys(data).length;

            //console.log(count)
            
            for (var i = 0; i < count; i++) {

                total += parseInt(data[i].price * data[i].amount)
                var amount = data[i].amount
                var id = data[i].id
                
                console.log(data[i].price)
                
            }
            console.log(total)
           // document.getElementById("totalsum").innerHTML = "<input type='hidden'  name='totalsum' value='" + total + "' ></input>"
            document.getElementById("total").innerHTML = "<h4>Total &nbsp:</h4> &nbsp" + ' ' + total + ".00" + " THB"
            
            document.getElementById("totalsum").innerHTML = "<input type='hidden'  name='totalsum' value='" + total + "' ></input>"  
        }
    })
    
    
   
}
//  function csrf(csrf){
//     var $csrf = csrf
//        console.log($csrf);
//        document.getElementById("csrf").innerHTML = "Total:" + ' ' + csrf + ".00" + " THB" + "<input type='hidden'  name='total' value='" + total + "' ></input>"
//  }


function closemodal() {
    $('#modal-list').empty();
    $(".modal").css('display', 'none')

    
}



function cartcount() {
    var countitems = 0
    $.ajax({
        
        url: 'cartget',
        type: 'get',
        dataType: 'json',
        success: function (response) {
            var data = response.data;
            //var length = lenght;     
            var cart = ''
            var count = Object.keys(data).length;

              

            for (var i = 0; i < count; i++) {

                countitems ++
                
            }
            document.getElementById("cartcount").innerHTML = countitems

        }

    })

}

function checkstock(amountnew,amount,p_id,order_id){
    var type = ''
    var order_id = order_id
    console.log(order_id)
    if(amountnew !=0){
        if(amountnew < amount){
            type = "decrease"
           // alert(type+amountnew+amount+p_id);
    }else{
          type ="increase"
    }
    }else{
        
         type = "delete"
    }
    
   
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/orderup2/'+ order_id,
        type: 'put',
        data: { amountnew:amountnew , amount: amount, p_id:p_id, type:type},
        dataType: 'json',
        success: function(data){
          //  console.log(data)
            location.reload();
        }
           
        
           

        

    })
    type= ''
    //alert(type+amountnew+amount+p_id);
}

function getorder_detail(id){
 var id = id 
 var getdatail_ad =''
 var getdatail = ''
  $.ajax({
    url: '/getdetail/'+ id,
    type: 'get',
    dataType: 'json',
    success: function(response){
       
         var data = response[0].data
         var count = Object.keys(data).length;
         for (var i = 0; i < count; i++){
        getdatail += `
        <div class="getdetail" id="getdetailmain"   ">
            <div class="getdetail-02 mb-4 mt-3" >
              
                <div class="getdetail-03">
                    <img src="../../uploadpic/product/${data[i].picture}" width="100px" height="100px" ></img>
                </div>
                <div class="d-flex flex-column"> 
         <h4><p>Name:</p></h4>
         <h4><p>Size:</p></h4>
         <h4><p>Price:</p></h4>
         <h4><p>Amount:</p></h4>
        
          </div>
          <div class="d-flex flex-column">
          <p>${data[i].product_name}</p>
          <p>${data[i].product_size}</p>
          <p>${data[i].product_price}THB</p>
          <p>${data[i].amount}</p>
          
          </div> 
                
                
            </div>    
           
        </div>`

       
       
         }
    var  total=` <p class="total-ad" style="font-size:20px">Total: ${response[2]}  THB</p>`    
         $(".order_out"+id).html(getdatail)
         $(".order-ad").css('display','flex')
         $(".order-ad-de").html(getdatail)
         $(".ordernumber").html(response[1])
         $(".total-ad").html( total)
         console.log(response)
         //console.log(data)
    }
   })
}


function showslip(picname){
$(".slip").css('display', 'flex')
 console.log(picname)
  var data=''
  data=`<td><img src="../../uploadpic/uploadslip/${picname}" width=500px" height="500px" ></td>`
  
    $('.slippic').html(data)
}


function closemodalslip() {
   
    $(".slip").css('display', 'none')

}
function closemodalorder() {
   
    $(".order-ad").css('display', 'none')

}
// function updatestatus(id) {
    
//     $.ajax({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         url: '/orderup2/'+ id,
//         type: 'put',
//         dataType: 'json',
//         success: function(data){
//             //console.log(data)
//             location.reload()
            
//         }
//     })
    
    
// }

function qrcode(){
    $(".qrcode").css('display', 'flex')
    var qr = `<img src="../../uploadpic/qrcode.jpg" width="500vw" height="500vw">`
     $('.qrcode-show').html(qr)
}
function closemodalqrcode() {
   
    $(".qrcode").css('display', 'none')

}

function tracking(id){
    var id = id
    input = `
    
    <input type="file" class="form-control " name="picture" id="trackdata`+id+`" required><br>
    <button type="button" class="btn btn-danger" onclick="cancel()" >ยกเลิก</button>
    <button type="submit" class="btn btn-success"  >บันทึก</button>
    
    `
    $(".input-tracking"+id).html('')
    $("#tracking"+id).html(input)
     
}
function showtrack(picname){
    $(".slip").css('display', 'flex')
     console.log(picname)
      var data=''
      data=`<td><img src="../../uploadpic/tracking/${picname}" width250px" height="200px" ></td>`
      
        $('.slippic').html(data)
    }

function upload(picture){
   console.log(picture)
}
// function tracksuccess(id,data){
    
//     var datatrack =data
//     $.ajax({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         url: '/track/'+ id,
//         data: {track:datatrack},
//         type: 'put',
//         dataType: 'json',
//         success: function(response){
          
//             location.reload()
//         }
//     })
  
    

function cancel(){
    location.reload()
}
function closemodal_order() {
    
    $(".modal").css('display', 'none')

    
}
function order_cf(id){
    $(".modal").css('display', 'flex')
    var data = `<button class="order-cf2" onclick="closemodal_order()"><p>ยกเลิก</p></button>
    <button class="order-cf2" onclick="cf_order(`+id+`)"><p>ยืนยัน</p></button>`
    $(".order-cf-cf").html(data)
}

function cf_order(id){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/cf_order/'+ id,
        type: 'put',
        dataType: 'json',
        success: function(data){
            location.reload()
            
            
        }
    })
   
}
function searchorder(search){
    var search = search
    $.ajax({
        url: '/searchorder/',
        type: 'get',
        data: { search:search},
        dataType: 'json',
        success: function(data){
            console.log(data)
           
             if(Object.keys(data).length > 0){
                 var order =  data.map(function(order){
                    let tracking =''
                    if(order.tracking != '-'){
                        tracking = `<button type="button" class="btn btn-info" onclick="showtrack('${order.tracking}')">กดดู</button>`
                    }else{
                        tracking = '-'
                    }
                     return `<tr>            
                     <td> ${order.ordernumber}   </td>
                 
                    <td>`+tracking+`</td>
                     
                 
                     <td> ${order.created_at}   </td>
                     <td> ${order.firstname} &nbsp; ${order.lastname}  </td>
                     <td> ${order.total}    </td>           
                     <td>
                     ${order.detail}             
                         </select>
                     </td>
                     <td>
                     ${order.updated_at}&nbsp; 
                     <button type="button" class="btn btn-info" onclick="showslip('${order.slip}')">สลิป</button>
                 </td>
                 </tr>`
                 })  
                 
                $("#order-detail").html('')
                 $.each(order, function(indexInArray,valueOforder){
                     $("#order-detail").append(valueOforder)
                 })
             }else{ 
                 $("#order-detail").html('')
               $("#order").append('<div class="searchnull"><h6>ไม่พบคำสั่งซื้อ</h6></div>')
             }
            console.log()
            
        }
    })
    
}

function search(search){
    var search = search
    $.ajax({
        url: '/search/',
        type: 'get',
        data: { search:search},
        dataType: 'json',
        success: function(data){
             
           
            if(Object.keys(data).length > 0){
                var items =  data.map(function(product){
                    return `<div class="itemslist" onclick="myFunction('${product.id}')">

                    <div class="itemslist">



                        <input type="hidden" value="${product.id}" name="itemId">
                        <img src="uploadpic/product/${product.picture}" width="150px" height="150px"><br>
                        <h2>${product.name}</h2>
                        <p>${product.festival}</p>
                        <p >size:    ${product.size}</p>
                        <p>stock:   ${product.stock}</p>



                    </div>

                </div>`
                })  
                console.log(items)
                $(".items").html('')
                $.each(items, function(indexInArray,valueOfitems){
                    $(".items").append(valueOfitems)
                })
            }else{ 
                $(".items").html('')
                $(".items").append('<div class="searchnull"><h3>ไม่พบสินค้า</h3></div>')
            }
           // console.log(response.data)
            
        }
    })
    
}

function changePW_add(){
    $("#card-body-detail").html('')

    resetPW = `<div class="mb-3 row gx-3">
    <!-- Form Group (first name)-->
    <div class="col-md-6">
        <label class="mb-1 small" >รหัสผ่านเดิม</label>
        <input class="form-control" name="oldpassword" type="password" id="oldpassword" placeholder="Enter your Old Password" >
        <input class="form-control" name="repw" value="repw" type="hidden" >
    </div>
</div>
<button class="btn btn-danger" onclick="cancel()"> ยกเลิก</button>
<button class="btn btn-primary" onclick="checkPW(document.getElementById('oldpassword').value)"> ยืนยัน</button>
`
    $(".formcontrol").css('display','flex')
    $("#card-body-detail").html(resetPW)
}


function checkPW(oldpw){
 
     let newpw = `<div class="mb-3 row gx-3">
    <!-- Form Group (first name)-->
    <div class="col-md-6">
        <label class="mb-1 small" >รหัสผ่านใหม่</label>
        <input class="form-control" name="newpassword" type="password" id="newpassword2" placeholder="Enter your New Password" onkeyup="checkpassword2(this.value); cfpassword2(document.getElementById('cfpassword2').value)">
        <div id="editpassword-feed"  style="color:#dc3545"></div>
    </div>
    
</div>
<div class="mb-3 row gx-3">
    <!-- Form Group (first name)-->
    <div class="col-md-6">
        <label class="mb-1 small" >ยืนยันรหัสผ่าน</label>
        <input class="form-control" name="cfpassword" type="password" id="cfpassword2" placeholder="Enter Confirm Password" onkeyup="cfpassword2(this.value)" >
        <div id="editpasswordcf-feed"  style="color:#dc3545"></div>
    </div>
    
</div>
<button class="btn btn-danger" onclick="cancel()"> ยกเลิก</button>
<button class="btn btn-primary" onclick="changePW(document.getElementById('newpassword2').value,document.getElementById('cfpassword2').value)">ยืนยัน</button>
`

let resetPW = `<div class="mb-3 row gx-3">
    
    <div class="alert alert-danger" id="errorpassword"  >
    รหัสผ่านเดิมไม่ถูกต้อง
    </div>

    <!-- Form Group (first name)-->
    <div class="col-md-6">
        <label class="mb-1 small" >รหัสผ่านเดิม</label>
        <input class="form-control" name="oldpassword" type="password" id="oldpassword" placeholder="Enter your Old Password" >
    </div>
</div>
<button class="btn btn-danger" onclick="cancel()">ยกเลิก</button>
<button class="btn btn-primary" onclick="checkPW(document.getElementById('oldpassword').value)"> ยืนยัน</button>
`
    $.ajax({
        
        url: '/checkpw/'+oldpw,
        type: 'get',
        dataType: 'json',
        success: function(data){
             
            
            console.log(data)

            
           if(data == 'success'){
            $("#card-body-detail").html(newpw)
           }else{
            //$("#errorpassword").css('display','flex')
            $("#card-body-detail").html(resetPW)
           }
           
        }
    })
    
}

function changePW(newpw,cfpw){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/newpw',
        type: 'post',
        data:{
            newpw:newpw,
            cfpw:cfpw
        },
        dataType: 'json',
        success: function(data){

            let newpw = `<div class="mb-3 row gx-3">
            <div class="alert alert-danger" id="errorpassword"  >
               ${data}
                </div>
                <div class="col-md-6">
                <label class="mb-1 small" >รหัสผ่านใหม่</label>
                <input class="form-control" name="newpassword" type="password" id="newpassword2" placeholder="Enter your New Password" onkeyup="checkpassword2(this.value); cfpassword2(document.getElementById('cfpassword2').value)">
                <div id="editpassword-feed"  style="color:#dc3545"></div>
            </div>
   
    
</div>
<div class="mb-3 row gx-3">
    <!-- Form Group (first name)-->
    <div class="col-md-6">
        <label class="mb-1 small" >ยืนยันรหัสผ่าน</label>
        <input class="form-control" name="cfpassword" type="password" id="cfpasswordedit" placeholder="Enter Confirm Password" onkeyup="cfpassword(this.value)">
        <div id="editpasswordcf-feed"  style="color:#dc3545"></div>
    </div>
    
</div>
<button class="btn btn-danger" onclick="cancel()">ยกเลิก</button>
<button class="btn btn-primary" onclick="changePW(document.getElementById('newpassword').value,document.getElementById('cfpassword').value)"> ยืนยัน</button>
`
        if(data == 'success'){
              location.reload()
        }else
        $("#card-body-detail").html(newpw)
            
        }
    })
}

function deletepic(pic){

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/deletepic',
        type: 'post',
        data:{
           pic:pic
        },
        dataType: 'json',
        success: function(data){
            console.log(data)
            location.reload()
        }
    })
   
}

function editpic(){
   var button = `<button class="btn btn-success"  type="submit">บันทึก</button>`
//    $("#editupload").attr('class', 'btn btn-success');
//    $("#editupload").attr('type', 'submit');
    $("#editupload").attr('style', "display:none");
   $("#newpic").html(button)
   
   
}

function AddSavebtn(){
     let savebtn =`<button class="btn btn-success me-1" type="submit" >บันทึก</button>`
    $(".SaveEdit").html(savebtn)
    $(".form-control").css('display', 'flex')
   
    $(".showedit").css('display', 'none')
    $("#deletepic").css('display', 'flex')
    $("#newpic").css('display', 'flex')
    
}


