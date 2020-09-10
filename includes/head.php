<!DOCTYPE html>
<html lang="en-us" prefix="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PseudoPark</title>

<script src="https://use.fontawesome.com/460434ea89.js"></script>
<!--MAP BOX -->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet"href="assets/css/animate.css">
<link rel="stylesheet"href="assets/css/main.css">
<link rel="stylesheet"href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/bootstrap.css" />
<link rel="stylesheet" href="assets/css/index.css" />

<?php
require'ajax.php';
include'config.php';
include'functions.php';
?>
<style>
html,body
{
    width: 100%;
    height: 100%;
    margin: 0px;
    padding: 0px;
    overflow-x: hidden;
}
</style>
</head>
<body>
  <header  class="">
      <div  class="header-wrapper">
          <div  class="top-left">
              <button  class="fa fa-search mobile-search" type="button"></button><a class="logo" href="index.php"><img alt=""  style="width:100px" src="images/logo-dark.png" /></a>
              <button  class="hamburger" style="font-size: 20px;"><span class=" fa fa-bars"></span></button>
              
          </div>
          <div  class="top-right">
              <ul  class="menu">
                    <?php if(!isset($_SESSION['user'])){
                      echo'
                          <li  class="no-tablet">
                              <a  href="" target="_blank">List Your Space</a>
                          </li>
                          <li  class="divider-line no-tablet"><a  href="tel:+91 ">+91 999999999 </a></li>
                          
                          <li  class="no-tablet">';
                      echo'<a href="" class="btn btn-primary null text-white" data-toggle="modal" data-target="#modalLRForm">Login</a>';
                    } else{
                      echo'<div class="divider">

                      </div> Hello! '.$_SESSION['user'].'&nbsp;&nbsp; <a href="logout.php" class="">Logout</a>';
                    } ?>
                  </li>
                  
              </ul>
          </div>
      </div>
      <div  class="mobile-menu-wrapper">
          <ul  class="mobile-menu">
              <li  class="mobile-close-menu">/li>
              <li  class="spacer-item">
                  <div  class="btn-group">
                    <?php if(!isset($_SESSION['user'])){
                      echo'<a href="" class="btn btn-primary null text-white" data-toggle="modal" data-target="#modalLRForm">Login</a>';
                    } else{
                      echo'<a href="" class="btn btn-primary null text-white" data-toggle="modal" data-target="#modalLRForm">Login</a>';
                    } ?>

                  </div>
              </li>
              <li  class="spacer-item"><a  target="_blank">List Your Space</a></li>
              <li  class="call-to-help"><h5 >GET IN TOUCH</h5></li>
              <li ><a  href="tel:+91 9355 48 9999">+91 999999999  </a></li>
          </ul>
      </div>
  </header>
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
