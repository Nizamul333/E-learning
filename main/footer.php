<!-- Start  Registration Modal -->
 <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="RegForm">
      <div class="form-group">
    <label for="exampleInputEmail1">Name <small id="msg1"></small></label>
    <input type="text" class="form-control" id="uname" aria-describedby="emailHelp"name="uname">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address <small id="msg2"></small></label>
    <input type="email" class="form-control" id="uemail" aria-describedby="emailHelp" name="uemail">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password <small id="msg3"></small></label>
    <input type="password" class="form-control" id="upassword" name="upassword">
  </div>
  
  
</form>
      
      </div>
      <div class="modal-footer">
        <span id="success"></span>
      <button type="button" class="btn btn-primary" onclick="addStu()">Sign Up</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- End  Registration Modal -->


<!-- start login Modal -->
<div class="modal fade" id="xampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
      
  <div class="form-group">
    <label for="exampleInputEmail1">Email address </label>
    <input type="email" class="form-control" id="LogEmail" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password </label>
    <input type="password" class="form-control" id="LogPass">
  </div>
  
  
</form>
      
      </div>
      <div class="modal-footer">
      <small id="LogMsg"></small>
      <button type="button" class="btn btn-primary" onclick="checkLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
      </div>
    </div>
  </div>
</div>

<!-- end login Modal -->

<!-- start adminlogin Modal -->

<div class="modal fade" id="ampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
      
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="adminLogEmail" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="adminLogPass">
  </div>
  
  
</form>
      
      </div>
      <div class="modal-footer">
        <small id="AdminLogMsg"></small>
      <button type="button" class="btn btn-primary" onclick="checkAdminLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
      </div>
    </div>
  </div>
</div>

<!-- end adminlogin Modal -->
    <footer>
        
        <p>459 BROADWAY,NEW YORK (212) 555-0123 NEJAMULHAQUESARKER@GMAIL.COM </p>
        <P>Powered by  <a href="" data-toggle="modal" data-target="#ampleModal" style="text-decoration: none;"><button> Admin Login</button></a></P>
    </footer>

    <!-- Jquery and Boostrap JavaScript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Font Awesome JS -->
    <script type="text/javascript" src="js/all.min.js"></script>

    <!-- Student Testimonial Owl Slider JS  -->
    <script type="text/javascript" src="js/owl.min.js"></script>
    <script type="text/javascript" src="js/testyslider.js"></script>

    <!--  Ajax Call JavaScript -->
    <script type="text/javascript" src="js/ajaxrequest.js"></script>
    <script type="text/javascript" src="js/adminajax.js"></script>
</body> 
</html>