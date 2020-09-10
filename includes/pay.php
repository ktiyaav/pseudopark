<?php
session_start();
include'config.php';
$_SESSION['to'] = $to = mysqli_real_escape_string($con,$_POST['to']);
$_SESSION['from'] = $from = mysqli_real_escape_string($con,$_POST['from']);
$_SESSION['vehicle'] = $vehicle = mysqli_real_escape_string($con,$_POST['vehicle']);
$_SESSION['id'] = $id = mysqli_real_escape_string($con,$_POST['id']);
$_SESSION['tid'] = $tid = mysqli_real_escape_string($con,$_POST['tid']);
$_SESSION['vno'] = $vno = mysqli_real_escape_string($con,$_POST['vno']);
$_SESSION['name'] = $name = mysqli_real_escape_string($con,$_POST['name']);
$_SESSION['phone'] = $phone = mysqli_real_escape_string($con,$_POST['phone']);
$_SESSION['hours'] =  $hours =  mysqli_real_escape_string($con,$_POST['hours']);
$_SESSION['userId'] = $userId =  mysqli_real_escape_string($con,$_POST['userid']);
$_SESSION['total'] = $total =  mysqli_real_escape_string($con,$_POST['total']);
$getParkName = mysqli_query($con,"SELECT * FROM parkdetails WHERE parkId = $id");
$getParkName = mysqli_fetch_array($getParkName);
$parkName = $getParkName['parkName'];
$price = $getParkName[$vehicle.'Price'];

$SQLfrom = date("yy-m-d h:i:s", strtotime("$from"));
$SQLto = date("yy-m-d h:i:s", strtotime("$to"));
if(isset($_POST['bookPark'])){
  $query="INSERT INTO `booking` (`parkId`,`userId`, `dateFrom`, `dateTo`, `hours`, `vehicle`, `price`, `totalPrice`, `transactionId`, `phone`, `name`, `vehicleno`) VALUES ('$id', '$userId', '$SQLfrom', '$SQLto', '$hours', '$vehicle', '$price', '$total', '$tid', '$phone', '$name', '$vno');";
}
if(mysqli_query($con,$query) == TRUE){
header('Location:../success.php');

}else{
}

?>
