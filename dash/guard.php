<?php
session_start();
$title= "Guard Dashboard";

//Includes Template Files
include'includes/head.php';
$level = $_SESSION['level'];
$parkId = $_SESSION['guardParkId'];
$guardId = $_SESSION['guardId'];

//Exit Fine Adding
if(isset($_GET['sakdnfjdwebcksadujecwbjksskladfiewncinsdknfkesajfosmclkmsdklfnisdncklsdamckenscosmdv'])){
  header('Location: guard.php');
}
//Add Fine
if(isset($_GET['asdjankjsdbkjabsckjkjabsdjkaasdmnajkscjkasnd']) AND isset($_GET['asdnajksdnkjanskdjnaasndjad']) AND isset($_GET['asdnaksndkjacjewfasdnakjsdn'])){
  $makeFineId = $_GET['asdjankjsdbkjabsckjkjabsdjkaasdmnajkscjkasnd'];
  $makeFineUserId = $_GET['asdnajksdnkjanskdjnaasndjad'];
  $date = $_GET['asdnaksndkjacjewfasdnakjsdn'];
  $newdate = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($date)));
  $now = date('Y-m-d h:i:s');
  $query1 ="INSERT INTO `fines` (`userId`, `guardId`, `bookingId`, `date`) VALUES ('$makeFineUserId', '$guardId', '$makeFineId', '$now')";
  $query2 ="UPDATE booking SET dateTo = '$newdate' WHERE bookingId = $makeFineId";
  $result1 = mysqli_query($con,$query1);
  $result2 = mysqli_query($con,$query2);
  header('Location:guard.php');
}
include'includes/main.php';
?>
<?php if(isset($_GET['asdklabsjkdbajkxbueriohacknaslknxlkwjefioasencsd87f9sakldbubsdkjcwjrhfiowescnlk'])){
  echo'
  <div class="container-fluid">
  <div class="card shadow mb-4">
  <div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">Add Fine</h6>
  </div>
  <div class="card-body">';
  $fineBookingid = $_GET['asdklabsjkdbajkxbueriohacknaslknxlkwjefioasencsd87f9sakldbubsdkjcwjrhfiowescnlk'];
  $resultFine = mysqli_query($con,"SELECT * FROM booking WHERE bookingId = $fineBookingid");
  $resultFine = mysqli_fetch_array($resultFine);
  $resultFineVehicle = $resultFine['vehicle'];
  $resultFineVehicleNo = $resultFine['vehicleno'];
  $resultFineInitialDate = $resultFine['dateTo'];
  $resultFineUserId = $resultFine['userId'];
  $resultPrice = mysqli_query($con,"SELECT * FROM parkdetails WHERE parkId = $parkId");
  $resultPrice = mysqli_fetch_array($resultPrice);
  $resultPrice = $resultPrice[$resultFineVehicle.'Price'];
  echo'Add One More Hour of Booking ID: <strong>'.$fineBookingid.'</strong> Vehicle No: <strong>'.$resultFineVehicleNo.'</strong> and Make a Fine Of Rs'.$resultPrice.'
  |
  <a href="guard.php?aksdhabscjwbefuehcsjbackjneoifhoansckjwejfbosdncjsfj=123123&asdjankjsdbkjabsckjkjabsdjkaasdmnajkscjkasnd='.$fineBookingid.'&asdnajksdnkjanskdjnaasndjad='.$resultFineUserId.'&asdnaksndkjacjewfasdnakjsdn='.$resultFineInitialDate.'" class="btn btn-success btn-icon-split">
  <span class="icon text-white-50">
  <i class="fas fa-check"></i>
  </span>
  <span class="text">Proceed</span></span>
  </a>
  |
  <a href="guard.php?sakdnfjdwebcksadujecwbjksskladfiewncinsdknfkesajfosmclkmsdklfnisdncklsdamckenscosmdv" class="btn btn-danger btn-icon-split">
  <span class="icon text-white-50">
  <i class="fas fa-trash"></i>
  </span>
  <span class="text">EXIT</span>
  </a>';
  echo'
  </div>
  </div>
  </div>';
} ?>
<?php
// Fetch the data from the booking table of a park id where guard is present
$query = "SELECT * FROM booking WHERE parkId = $parkId ORDER BY dateFrom";
$result = mysqli_query($con,$query);
// show list of all bookings
echo '
<form name="addFine" action="" autocomplete="off">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Booking Details</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>SL</th>
              <th>Booking Id</th>
              <th>Vehicle</th>
              <th>Vehicle No</th>
              <th>Booking From</th>
              <th>Booking Till</th>
              <th><i class="fas fa-pencil">Edit</i></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>SL</th>
              <th>Booking Id</th>
              <th>Vehicle</th>
              <th>Vehicle No</th>
              <th>Booking From</th>
              <th>Booking Till</th>
              <th><i class="fas fa-pencil">Edit</i></th>
            </tr>
          </tfoot>
          <tbody>
';
$c = 1;
while($row = mysqli_fetch_array($result)){
  ?>
  <tr>
    <td><?php echo $c++;?></td>
    <td><?php echo $row['bookingId'];?></td>
    <td><?php echo $row['vehicle'];?></td>
    <td><?php echo $row['vehicleno'];?></td>
    <td><?php echo $row['dateFrom'];?></td>
    <td><?php echo $row['dateTo'];?></td>
    <td><a href="guard.php?asdklabsjkdbajkxbueriohacknaslknxlkwjefioasencsd87f9sakldbubsdkjcwjrhfiowescnlk=<?php echo $row['bookingId'];?>" class="">Add Fine</a></td>
  </tr>
  <?php
}
echo'
          </tbody>
        </table>
      </div>
    </div>
  </div>
</form>
';

include'includes/foot.php';
?>
