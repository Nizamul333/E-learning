function checkAdminLogin() {
    var adminLogEmail = $("#adminLogEmail").val();
    var adminLogPass = $("#adminLogPass").val();
    console.log(adminLogEmail, adminLogPass);
    $.ajax({
      url: "admin/admin.php",
      type: "post",
      data: {
        checkLogemail: "checklogmail",
        adminLogEmail: adminLogEmail,
        adminLogPass: adminLogPass
      },
      success: function(data) {
        //console.log(data);
        if (data == 0) {
          $("#AdminLogMsg").html(
            '<small class="alert alert-danger"> Invalid Email ID or Password ! </small>'
          );
        } else if (data == 1) {
          $("#AdminLogMsg").html(
            '<small class="alert alert-success"> Success! Loading..... </small>'
          );
          // Empty Login Fields
          
          setTimeout(() => {
            window.location.href = "admin/adminDashboard.php";
          }, 1000);
        }
      }
    });
  }