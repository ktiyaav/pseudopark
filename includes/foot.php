<?php
//register
if($_POST['register']){
  $emailreg = $_POST['email'];
  $passwordreg = $_POST['password'];
  $query = mysqli_query($con,"INSERT INTO `users` (`userId`, `name`, `dob`, `age`, `phone`, `uid`, `drivingLicense`, `walletBalance`, `password`) VALUES (NULL, '$emailreg', NULL, NULL, NULL, NULL, NULL, NULL, '$passwordreg')");
  if($query){
    $_SESSION['user'] = $emailreg;
  }
}
?>
<?php //Error Message Popup
if(isset($_GET['message'])){ ?>
  <script type="text/javascript">
      $(function () {
          $('#errorModal').modal('show');
      });
  </script>
  <div class="modal fade" tabindex="-1" role="dialog" id="errorModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button"><span aria-hidden="true"></span></button>
                <h4 class="modal-title">Hey! We got an Error :/</h4>
            </div>
            <div class="modal-body">
              <?php echo $_GET['message'];?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">I Got It</button>
            </div>
        </div>
    </div>
  </div>
<?php }?>


<footer class="page-footer font-small blue">
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href=""> PSUEDOPARK</a>
  </div>
</footer>

<style>

</style>

<?php //Login & Register Popup ?>
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <div class="modal-content">
      <div class="modal-c-tabs">
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i>
              Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i>
              Register</a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

            <div class="modal-body mb-1">
              <form action="" method="POST" autocomplete="OFF">
                <div class="md-form form-sm mb-2">
                  <i class="fa fa-envelope prefix"></i>
                  <input type="text" id="modalLRInput10" name="user" class="form-control form-control-sm validate" placeholder="Your email">
                </div>
                <div class="md-form form-sm mb-4">
                  <i class="fa fa-lock prefix"></i>
                  <input type="password" name="password" id="modalLRInput11" class="form-control form-control-sm validate" placeholder="Your password">
                </div>
                <div class= "mt-2">
                  <button type="submit" name="login" class="btn btn-info">Log in <i class="fa fa-sign-in ml-1"></i></button>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <div class="options mt-1">
                <p>Not a member? <a href="#" class="blue-text">Sign Up</a></p>
                <p>Forgot <a href="#" class="blue-text">Password?</a></p>
              </div>
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
          <div class="tab-pane fade" id="panel8" role="tabpanel">
            <div class="modal-body">
              <div class="md-form form-sm mb-2">
                <i class="fa fa-envelope prefix"></i>
                <input type="email" id="modalLRInput12" class="form-control form-control-sm validate" placeholder="Your email">
              </div>
              <div class="md-form form-sm mb-2">
                <i class="fa fa-lock prefix"></i>
                <input type="password" id="modalLRInput13" class="form-control form-control-sm validate" placeholder="Your password">
              </div>
              <div class="md-form form-sm mb-4">
                <i class="fa fa-lock prefix"></i>
                <input type="password" id="modalLRInput14" class="form-control form-control-sm validate" placeholder="Repeat password">
              </div>
              <div class= "form-sm mt-2">
                <button class="btn btn-info">Sign up <i class="fa fa-sign-in ml-1"></i></button>
              </div>
            </div>
            <div class="modal-footer">
              <div class="options text-right">
                <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
              </div>
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="assets/js/jquery.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/moment.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>

<script type="text/javascript">
	$('.date').datetimepicker({
        pick12HourFormat: true,
		format: "dd MM yyyy HH:ii P",
		startDate:"02-10-2010",
        language:  'en',
		autoclose: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
		minuteStep: 30,
		inline: 1,
        sideBySide: 1,
        pickerPosition: "bottom-right",

    });
</script>
<?php include'load_map.php';?>
</body>
</html>
