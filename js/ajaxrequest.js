function addStu() {
    
    var uname = $("#uname").val();
    var uemail = $("#uemail").val();
    var upass = $("#upassword").val();
    console.log(uemail);
    console.log(uname);
    console.log(upass);
    if (uname.trim() == "") {
        $("#msg1").html(
          '<small style="color:red;"> Please Enter Name ! </small>'
        );
        $("#uname").focus();
        return false;
      }
      else if (uemail.trim() == "") {
        $("#msg2").html(
          '<small style="color:red;"> Please Enter Email ! </small>'
        );
        $("#uemail").focus();
        return false;
      }

      else if (upass.trim() == "") {
        $("#msg3").html(
          '<small style="color:red;"> Please Enter Password ! </small>'
        );
        $("#stupass").focus();
        return false;
      }
     
else{

    $.ajax({
        url: "user/adduser.php",
        type: "post",
        data: {
            stusignup: "stusignup",
            uname: uname,
            uemail: uemail,
            upass: upass
        },

        success: function(data) {
            
           // document.getElementById("success").innerHTML = 'Registration successfull';
           if(data="OK"){
            document.getElementById('success').innerHTML = 'Registration successfull';
            clearStuRegField();
           }

           else if(data="Failed"){
            document.getElementById('success').innerHTML = 'Registration failed';
            }
        }
    })

}
}

function clearStuRegField() {
    $("#RegForm").trigger("reset");
    $("#msg1").html(" ");
    $("#msg2").html(" ");
    $("#msg3").html(" ");
  }
    


  //Ajax Call for  Login Verification

    





function checkLogin() {
    var LogEmail = $("#LogEmail").val();
    var LogPass = $("#LogPass").val();
    $.ajax({
      url: "user/adduser.php",
      type: "post",
      data: {
        checkLogemail: "checklogmail",
        LogEmail: LogEmail,
        LogPass: LogPass
      },
      success: function(data) {
        console.log(data);
        if (data == 0) {
          $("#LogMsg").html(
            '<small class="alert alert-danger"> Invalid Email ID or Password ! </small>'
          );
        } else if (data == 1) {
          $("#LogMsg").html(
            '<div class="spinner-border text-success" role="status"></div>'
          );
          // Empty Login Fields
         
          setTimeout(() => {
            window.location.href = "index.php";
          }, 1000);
        }
      }
    });
  }




