


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
        <img src="../../uploadpic/${data.picture}" width="200px" height="200px" ></img>
        
        <div class="modal-detail"> 
            <input type="hidden"  name="id" value="${data.id}" >
            <p class="text-modal">name:     ${data.name}</p> 
            <input type="hidden"  name="name" value="${data.name}" > 
            <p class="text-modal">festival: ${data.festival}</p>
            <input type="hidden"  name="festival" value="${data.festival}" >
            <p class="text-modal">price:    ${data.price} THB</p> 
            <input type="hidden"  name="price" value="${data.price}" >
            <p class="text-modal">brand:    ${data.brand}</p>
            <input type="hidden"  name="brand" value="${data.brand}" >
            <p class="text-modal">size:     ${data.size}</p>
            <input type="hidden"  name="size" value="${data.size}" >
            <p class="text-modal">chest:    ${data.chest}</p>
            <input type="hidden"  name="chest" value="${data.chest}" >
            <p class="text-modal">lenght:   ${data.lenght}</p>
            <input type="hidden"  name="lenght" value="${data.lenght}" >
            <p class="text-modal">color:    ${data.color}</p>
            <input type="hidden"  name="color" value="${data.color}" >
                    
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
            document.getElementById("total").innerHTML = "Total:" + ' ' + total + ".00" + " THB"
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
 
 var getdatail = ''
  $.ajax({
    url: '/getdetail/'+ id,
    type: 'get',
    dataType: 'json',
    success: function(response){
       
         var data = response.data
         var count = Object.keys(data).length;
         for (var i = 0; i < count; i++){
        getdatail += `
        <div class="getdetail" id="getdetailmain">
            <div class="getdetail-02">
                <div class="getdetail-03">
                    <img src="../../uploadpic/${data[i].picture}" width="100px" height="100px" ></img>
                </div>
                <div class="getdetail-03">   
                <p>name ${data[i].product_name}</p>
                <p>Size:    ${data[i].product_size}</p>
                <p>Price:   ${data[i].product_price}</p>
                <p>Amount:  ${data[i].amount}</p>
                </div>
                
            </div>    
           
        </div>                            
             
            
            `
       
         }
         $("#order_out"+id).html(getdatail)
        // console.log(getdatail)
         //console.log(data)
    }
   })
}

function order_status(id){
    var id = id
   if (id == 1){
    $(".status-color"+id).css('color','red')
    $(".order-status"+id).css('border-radius', '25px')
    $(".order-status"+id).css('min-width', '20px')
    
    
    console.log(id)
   }else{
    $(".status-color"+id).css('color','green')
    $(".order-status"+id).css('border-radius', '25px')
    $(".order-status"+id).css('min-width', '20px')
    
    console.log(id)
   }
   
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
function updatestatus(id) {
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/orderup2/'+ id,
        type: 'put',
        dataType: 'json',
        success: function(data){
            //console.log(data)
            location.reload()
            
        }
    })
    
    
}

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
    input = `<input type="text" class="track-inp" id="trackdata`+id+`">
    <button type="button" class="btn btn-danger" onclick="cancel()" >ยกเลิก</button>
    <button type="button" class="btn btn-success" onclick="tracksuccess('`+id+`',document.getElementById('trackdata`+id+`').value)" >บันทึก</button>`
    $("#input-tracking"+id).html(input)
     
}
function tracksuccess(id,data){
    
    var datatrack =data
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/track/'+ id,
        data: {track:datatrack},
        type: 'put',
        dataType: 'json',
        success: function(response){
          
            location.reload()
        }
    })
  
    
}
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
                        <img src="uploadpic/${product.picture}" width="150px" height="150px"><br>
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
        <label class="mb-1 small" >Old Password</label>
        <input class="form-control" name="oldpassword" type="password" id="oldpassword" placeholder="Enter your Old Password" >
    </div>
</div>
<button class="btn btn-primary" onclick="checkPW(document.getElementById('oldpassword').value)"> Submit</button>
`
    $("#card-body-detail").html(resetPW)
}


function checkPW(oldpw){
 
     let newpw = `<div class="mb-3 row gx-3">
    <!-- Form Group (first name)-->
    <div class="col-md-6">
        <label class="mb-1 small" >New Password</label>
        <input class="form-control" name="newpassword" type="password" id="newpassword" placeholder="Enter your New Password" >
    </div>
    
</div>
<div class="mb-3 row gx-3">
    <!-- Form Group (first name)-->
    <div class="col-md-6">
        <label class="mb-1 small" >Confirm Password</label>
        <input class="form-control" name="cfpassword" type="password" id="cfpassword" placeholder="Enter Confirm Password" >
    </div>
    
</div>
<button class="btn btn-primary" onclick="changePW(document.getElementById('newpassword').value,document.getElementById('cfpassword').value)"> Submit</button>
`

let resetPW = `<div class="mb-3 row gx-3">
    
    <div class="alert alert-danger" id="errorpassword"  >
    รหัสผ่านเดิมไม่ถูกต้อง
    </div>

    <!-- Form Group (first name)-->
    <div class="col-md-6">
        <label class="mb-1 small" >Old Password</label>
        <input class="form-control" name="oldpassword" type="password" id="oldpassword" placeholder="Enter your Old Password" >
    </div>
</div>
<button class="btn btn-primary" onclick="checkPW(document.getElementById('oldpassword').value)"> Submit</button>
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

    <!-- Form Group (first name)-->
    <div class="col-md-6">
        <label class="mb-1 small" >New Password</label>
        <input class="form-control" name="newpassword" type="password" id="newpassword" placeholder="Enter your New Password" >
    </div>
    
</div>
<div class="mb-3 row gx-3">
    <!-- Form Group (first name)-->
    <div class="col-md-6">
        <label class="mb-1 small" >Confirm Password</label>
        <input class="form-control" name="cfpassword" type="password" id="cfpassword" placeholder="Enter Confirm Password" >
    </div>
    
</div>
<button class="btn btn-primary" onclick="changePW(document.getElementById('newpassword').value,document.getElementById('cfpassword').value)"> Submit</button>
`
        if(data == 'success'){
              location.reload()
        }else
        $("#card-body-detail").html(newpw)
            
        }
    })
}