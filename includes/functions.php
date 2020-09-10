<?php
if(isset($_POST['register'])){

}
if(isset($_POST['login'])){

  $username = mysqli_real_escape_string($con,$_POST['user']);
  $password = mysqli_real_escape_string($con,$_POST['password']);
  $query = "SELECT * FROM users WHERE name = '$username' AND password = '$password'";
  $result = mysqli_query($con,$query);
  $no = mysqli_num_rows($result);
  $result = mysqli_fetch_array($result);
  $name = $result['name'];
  $userId = $result['userId'];
  if ($no ==1 ){
    $_SESSION['user'] = $name;
    $_SESSION['userId'] = $userId;
  }
}
?>
