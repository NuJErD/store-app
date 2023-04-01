function checkuser(name){
    $("#usercheck").html('')
    $("#usercheck-feed").html('กรุณากรอกข้อมูล')
    
    $.ajax({
        url: '/checkuser',
        type: 'get',
        data: { name:name},
        dataType: 'json',
        success: function(data){
            
          console.log(data)
          if(data == 'fail'){
            $("#usercheck-feed").html('')
            $("#username").css("border-color","#dc3545")
            document.getElementById("usercheck").innerHTML = "ชื่อผู้ใช้นี่มีผู้อื่นใช้แล้ว ลองใช้ชื่ออื่น"
          }else if(data == 'success'){
            $("#username").css("border-color","#198754")
          }else{
            $("#username").css("border-color","#dc3545")
          }
           
        }  
    })
    
}

function checkpassword(pw){
    var passcount = pw.length
 if(passcount != 0){
    if(passcount < 5 || passcount > 20){
        $("#password-feed").html('รหัสผ่านต้องมีความยาว 5-20')
        $("#password").css("border-color","#dc3545")
    }else{
        $("#password-feed").html('')
        $("#password").css("border-color","#198754")
    }
    }else{
        $("#password-feed").html('')
        $("#password").css("border-color","#dc3545")
    }

    

}





function cfpassword(pw){
        $("#passwordcf-feed").html('')
        var pw = pw   //4
        var passcount = pw.length //4
    let password = document.getElementById('password').value //4
    if(passcount != 0){
        if(pw != password){
            $("#passwordcf-feed").html('รหัสผ่านไม่ตรงกัน')
            $("#passwordcf").css("border-color","#dc3545")
            
        }else {
            $("#passwordcf").css("border-color","#198754")
            $("#passwordcf-feed").html('')
        }
    }else{
        $("#passwordcf-feed").html('')
    } 
    
    
   

}

