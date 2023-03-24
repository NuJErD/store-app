
function myFunction(id) {
    $("#modalopen").css('display', 'flex')
    $("#modalopen-store").css('display', 'flex')
    var $id = id
    console.log($id)
    //;
    $.ajax({
        
        url: '/modal/'+id,
        type: 'get',        
        dataType: 'json',
        success: function (response) {
            // $('#modal-list').empty();        
            var data = response.data[0];

            //console.log(response.data[0])

            var detail = '';
            detail += `<div class="modal-content">
        <img src="../../uploadpic/${data.picture}" width="200px" height="200px" ></img>
        
        <div class="modal-detail"> 
            <input type="hidden"  name="id" value="${data.id}" >
            <p class="text-modal">name:     ${data.name}</p> 
            <input type="hidden"  name="name" value="${data.name}" > 
            <p class="text-modal">festival: ${data.festival}</p>
            <input type="hidden"  name="festival" value="${data.festival}" >
            <p class="text-modal">price:    ${data.price}</p> 
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
    var status =document.getElementById('status'+id).value
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/orderup2/'+ id,
        type: 'put',
        data: {status:status },
        dataType: 'json',
        success: function(data){
            //console.log(data)
            location.reload();
            
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