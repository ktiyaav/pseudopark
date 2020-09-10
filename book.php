<?php
session_start();
$title = "Book Parking";

include'includes/head.php';
$to = $_GET['to'];
$from = $_GET['from'];

$city = mysqli_real_escape_string($con,$_GET['city']);
$place= mysqli_real_escape_string($con,$_GET['place']);
$vehicle = mysqli_real_escape_string($con,$_GET['type']);
$id = mysqli_real_escape_string($con,$_GET['id']);
if($from=='' OR $to==''){
  echo '<script> document.location.href="search.php?place='.$place.'&city='.$city.'&message=Please Select a date from when you want to book the parking";</script>';
}
if($to<$from){
  echo '<script> document.location.href="search.php?place='.$place.'&city='.$city.'&message=Please Select a valid date upto which you want to book a parking";</script>';
}

$getParkName = mysqli_query($con,"SELECT * FROM parkdetails WHERE parkId = $id");
$getParkName = mysqli_fetch_array($getParkName);
$parkName = $getParkName['parkName'];
$total = $getParkName[$vehicle];
$SQLfrom = date("yy-m-d h:i:s", strtotime("$from"));
$SQLto = date("yy-m-d h:i:s", strtotime("$to"));
$noOfBoking = mysqli_num_rows(mysqli_query($con,"SELECT * FROM booking WHERE parkId = $id AND vehicle = '$vehicle' AND  dateFrom>='$from' AND dateTo <='$to'	"));

if($total>$noOfBoking){

echo'<div class="content-search">';
?>
<div class="row search-wrap">
    <div class="col-12 col-lg-5">
  <div class="row">
    <div class="col-5 date-head space0">Arrive After</div>
    <div class="col-2 date-head space0"><i class="fa fa-long-arrow-right arrow-right" aria-hidden="true"></i></div>
    <div class="col-5 date-head space0">Exit Before</div>
  </div>
  <div class="row">
    <div class="col-5 space0">
      <div class='datechos input-group' style="display: inline;">
        <div class="inline" id="date-from" value=""><?php echo $from?></div>&nbsp;
        <input type='text' style="display:none;" name="from" class="" required />
        <span class="input-group-addon"><a href="javascript:history.back()"><span class="fa fa-pencil calendar-icon text-white"></a></span></span>
      </div>
    </div>
    <div class="col-2 date-head  space0"></div>
    <div class="col-5 space0">
      <div class='input-group' style="display: inline;">
        <div class="inline" id="date-to"><?php echo $to;?></div>&nbsp;
        <input type='text' style="display:none;" name="to" class="" required />
        <span class="input-group-addon"><a href="javascript:history.back()"><span class="fa fa-pencil calendar-icon text-white"></a></span></span>
      </div>
    </div>
  </div>
</div>
</div>
<form action="fetch.php" style="display: inline;" autocomplete="off">
<div class="row">
<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12" style="margin-right:0px;padding-right:0px;">
  <div class="scroll-area">
  		<div class="searchInfo">
    			<div class="row">
    				<div class="col-md-8 col-6">
    					<div class="title">Parking In </div>
              <?php echo$parkName;?><br /><a href="search.php?place=<?php echo $place;?>&city=<?php echo$city;?>&message=Showing All Parkings"> <span class="" style="color: #222"><i class="fa fa-list"></i>&nbsp;View All</span></a>
    				</div>
            <div class="col-md-4 col-6 vehicle-selector text-right">
      				<?php if($vehicle=='bike'){
                echo'
                <label for="radio--03">
                <input type="radio" id="radio--03" name="vehicleType"checked value="bike">
                <span><i class="fa fa-motorcycle" aria-hidden="true"></i></span>
                </label>
                          ';}?>
      				<?php if($vehicle=='car'){
                echo'
                <label for="radio--04">
                <input type="radio" id="radio--04" name="vehicleType" value="car">
                <span><i class="fa fa-car" aria-hidden="true"></i></span>
                </label>
                          ';}?>
      				<?php if($vehicle=='bus'){
                echo'
                <label for="radio--05">
                <input type="radio" id="radio--05" name="vehicleType" value="bus">
                <span><i class="fa fa-bus" aria-hidden="true"></i></span>
                </label>
                ';}?>
      			</div>
    			</div>

    			<div class="row">
    				<div class="col-md-8 col-6 city-name">

            </div>

    			</div>
  		</div>
  </form>

			<div class="listing-container row" id="" style="border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">
					<div class="listing-thumb col-3">
						<div class=""><img src="images/parking/<?php echo $getParkName['image'];?>" alt="Quik Park - 1133 Garage entrance"></div>
					</div>
					<div class="listing-details col-8">
						<div class="row listing-content">
							<div class="col-8 space0">
								<div class="parking-name"><?php echo $getParkName['parkName'];?></div>
								<div class="address"><?php echo $getParkName['parkAddress'];?></div>
							</div>
							<div class="col-4 space0">
								<div class="listing-price text-right"><sup>₹</sup><?php echo $getParkName[$vehicle.'Price'];?></div>
							</div>
						</div>
				</div>
			</div>
			<div class="row">
  			<div class="listing-container about" style="">
            <div class="title">About This Parking</div>
            <div class=""><p>
              <?php echo $getParkName['about'];?>
            </div>
        </div>
			  <div class="area zebra-dark" style="padding: 10px 50px;background-color: #f4f4f1; width:100%">
          <div class="rate-this-location text-size-16 text-color-dark-slate">
            <span class="">
              <svg xmlns="http://www.w3.org/2000/svg" width="37" height="26" viewBox="0 0 37 26"><g fill="none" fill-rule="evenodd"><g fill="#415765"><path d="M23.008 24.362H21.13a14.494 14.494 0 0 1-.134-.78c.978-.088 1.673-.211 2.2-.388-.057.507-.124.912-.187 1.168zM5.09 22.182c-1.405-.093-2.295-.234-2.728-.405 0-.001-.063-.065-.144-.284a.692.692 0 0 0-.046-.1c-.053-.181-.08-.334-.085-.364a27.324 27.324 0 0 1-.213-1.307c-.41-2.996.014-4.908 1.26-5.684a.712.712 0 0 0 .072-.05c.843-.685 1.42-1.65 1.476-1.753.688-1.467 1.65-2.93 1.999-3.064 1.247-.204 3.513-.33 5.943-.33 2.404 0 4.67.126 5.895.326.368.139 1.331 1.601 2.054 3.13.024.04.599 1.006 1.443 1.69.02.016.072.052.102.073a.885.885 0 0 0 .106.098c1.067.803 1.453 2.551 1.144 5.196a25.71 25.71 0 0 1-.26 1.675.7.7 0 0 0-.013.128c-.007.04-.018.094-.033.157a.498.498 0 0 0-.022.066 1.42 1.42 0 0 1-.147.378c-.52.203-1.37.335-2.735.425H5.09zm-.971 2.18h-1.88a10.845 10.845 0 0 1-.188-1.165c.526.174 1.222.297 2.2.386-.04.275-.088.563-.132.779zm18.998-11.336a1.447 1.447 0 0 0-.262-.214c-.603-.5-1.046-1.22-1.05-1.22-.64-1.363-1.886-3.673-3.045-3.864-1.313-.214-3.664-.347-6.163-.347-2.47 0-4.822.133-6.136.347-1.16.19-2.406 2.505-3.012 3.804-.005.007-.457.761-1.08 1.28-1.735 1.11-2.37 3.481-1.899 7.045v.188c0 5.777.995 5.777 1.37 5.777h2.732c.712 0 .88-.68 1.09-2.143 1.61.082 3.844.12 6.944.12 3.124 0 5.37-.038 6.977-.119.213 1.462.381 2.142 1.093 2.142h2.733c.374 0 1.37 0 1.37-5.8 0-.191-.003-.374-.006-.554.353-3.13-.202-5.298-1.656-6.442z"></path><path d="M4.136 16.045l-.074-.04c.66-.079 1.45.185 2.155.714-.562.051-1.301-.021-2.081-.674m3.16-.306c-1.056-.89-2.294-1.318-3.402-1.184-.531.067-.964.445-1.13.99a1.532 1.532 0 0 0 .48 1.63c.807.676 1.714 1.016 2.703 1.016.257 0 .52-.023.789-.07.583-.1 1.007-.453 1.132-.946.06-.236.126-.85-.572-1.436M21.452 16.038c-.788.66-1.535.732-2.09.682.705-.53 1.49-.793 2.09-.682m.879 1.142a2.15 2.15 0 0 0 .088-.08c.411-.378.566-.99.395-1.555-.164-.544-.596-.924-1.129-.99-1.107-.138-2.346.296-3.402 1.182-.697.586-.633 1.2-.572 1.437.125.494.548.847 1.133.948.268.046.53.069.788.069.989 0 1.895-.34 2.699-1.01M16.704 19.045c-.012.004-1.17.474-3.96.474-2.972 0-4.065-.45-4.102-.467a.693.693 0 0 0-.927.363.743.743 0 0 0 .345.969c.128.06 1.344.596 4.684.596 3.075 0 4.365-.527 4.503-.587a.738.738 0 0 0 .374-.95.698.698 0 0 0-.917-.398M6.547 13.45h11.07a.718.718 0 0 0 .706-.73.718.718 0 0 0-.706-.73H7.75c.245-.327.575-.65.995-.82a.74.74 0 0 0 .4-.947.698.698 0 0 0-.913-.414c-1.644.666-2.32 2.585-2.348 2.666a.748.748 0 0 0 .088.667c.132.194.346.309.575.309"></path></g><path fill="#10D492" d="M22.652 10.853l-2.686 2.685-2.685-2.685H15.75a2.88 2.88 0 0 1-2.88-2.88V2.88A2.88 2.88 0 0 1 15.75 0h18.37A2.88 2.88 0 0 1 37 2.88v5.093a2.88 2.88 0 0 1-2.88 2.88H22.652z"></path><g fill="#FFF"><path d="M18.178 6.906l-1.702.915.325-1.937-1.377-1.372 1.903-.283.851-1.762.851 1.762 1.903.283-1.377 1.372.325 1.937zM24.935 6.906l-1.702.915.325-1.937-1.377-1.372 1.903-.283.85-1.762.852 1.762 1.903.283-1.377 1.372.325 1.937zM31.691 6.906l-1.702.915.325-1.937-1.377-1.372 1.903-.283.851-1.762.851 1.762 1.903.283-1.377 1.372.325 1.937z"></path></g></g></svg></span><span class="rated">RATED: <span class="green fs18">4.2</span>
              <span class="text-size-12 text-weight-book">out of 5</span>
            </span></div>
          </div>
        </div>
      <?php
      if(!isset($_SESSION['user'])){
          echo '

              <div class="icon-bar">
              <a href="index.php"><img src="images/home.webp" width="30" /></a>
              <a href="index.php"><img src="images/search.png" width="30" /></a>
              <a href="" data-toggle="modal" data-target="#modalLRForm"><img src="images/me.png" width="30" /></a>
              </div>
              <div class="text-center pt40">
                <a href="" class="btn btn-primary null text-white" data-toggle="modal" data-target="#modalLRForm">Book Now</a>
              </div>';
      }else{
          $date1 = $from;
          $date2 = $to;
          $date1Timestamp = strtotime($date1);
          $date2Timestamp = strtotime($date2);
          $difference = $date2Timestamp - $date1Timestamp;
          $hours = floor($difference / (60*60) );
          $total = $getParkName[$vehicle.'Price']*$hours;
          $totalPaise = $total*100;
        ?>
        <form action="includes/pay.php"  method="post" autocomplete="off">
        <div class="print">
              <div class="title" style="padding: 10px 30px; width:100%">Your Booking Details</div>
              <div class="row about">
              <div class="col-5 title-book">Vehicle</div>:<div class="col-5"><?php echo $vehicle;?></div>
              <input type="hidden" id="vehicle" name="vehicle" value="<?php echo $vehicle; ?>" required>
              <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" required>
              <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['userId']; ?>" required>
              <div class="col-5 title-book">From</div>:<div class="col-5"><?php echo $from;?></div>
              <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" required>
              <div class="col-5 title-book">Till</div>:<div class="col-5"><?php echo $to;?></div>
              <input type="hidden" id="to" name="to" value="<?php echo $to; ?>" required>
              <div class="col-5 title-book">Till</div>:<div class="col-5"><?php echo $getParkName[$vehicle.'Price'];?></div>
              <input type="hidden" id="price" name="price" value="<?php echo $getParkName[$vehicle.'Price']; ?>" required>
              <div class="col-5 title-book">Total Time</div>:<div class="col-5"><?php echo $hours;?> hours</div>
              <input type="hidden" id="hours" name="hours" value="<?php echo $hours; ?>" required>
              <div class="col-5 title-book">Total Price</div>:<div class="col-5">Rs <?php echo $total;?></div>
              <input type="hidden" id="total" name="total" value="<?php echo $total; ?>" required>
              <div class="col-5 title-book"></div>&nbsp;<div class="col-5"></div>
              <div class="col-5 title-book">Pay via</div>:<div class="col-5">UPI</div>
              <div class="col-5 title-book">UPI Details</div>:<div class="col-5">8409258741@ybl</div>
              <div class="col-5 title-book"></div>&nbsp;<div class="col-5"></div>
              <div class="col-5 title-book">Payment Process</div>:<div class="col-5">Pay on the Given UPI and enter the Transaction ID Below</div>
              </div>
              <div class="title" style="padding: 10px 30px; width:100%">
                Transaction Details
              </div>
              <div class="row about">
                <div class="col-5 title-book">Transaction Id</div>:<div class="col-5"><input class="booking-input" type="text" name="tid" placeholder="Transaction ID here" required></input></div>
                <div class="col-5 title-book"></div>&nbsp;<div class="col-5"></div>
                <div class="col-5 title-book">Phone Number</div>:<div class="col-5"><input class="booking-input" type="tel" name="phone" placeholder="8409258741" maxlength="10" required></input></div>
              </div>

              <div class="title" style="padding: 10px 30px; width:100%">Personal Details</div>
              <div class="row about">
                <div class="col-5 title-book">Name</div>:<div class="col-5"><input class="booking-input" type="text" name="name" required placeholder="Samir"></input></div>
                <div class="col-5 title-book"></div>&nbsp;<div class="col-5"></div>
                <div class="col-5 title-book">Vehicle Number</div>:<div class="col-5"><input  required class="booking-input" type="text" name="vno" placeholder="UP16CH46645" maxlength="10"></input></div>
                <br><br>
              </div>
              <div class="booking-button-wrapper about">
                <div class="location" id="checkout-button">
                <button class="checkout-button" name="bookPark" type="submit">Book Now</button></div>
              </div>
        </form>
        <br /><br /><br />
        <div class="about">
          <form action="http://localhost/payment/success/" method="POST">
          <script
              src="http://checkout.razorpay.com/v1/checkout.js"
              data-key="rzp_test_eyKOBe0Ibu18wL" // Enter the Key ID generated from the Dashboard
              data-amount="50000" // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
              data-currency="INR"
              data-order_id="order_CgmcjRh9ti2lP7"//This is a sample Order ID. Pass the `id` obtained in the response of the previous step.
              data-buttontext="Pay with Razorpay"
              data-name="Acme Corp"
              data-description="Test transaction"
              data-image="http://localhot/park/image/logo-dark.png"
              data-prefill.name="Gaurav Kumar"
              data-prefill.email="gaurav.kumar@example.com"
              data-prefill.contact="9999999999"
              data-theme.color="#F37254"
          ></script>
          <input type="hidden" custom="Hidden Element" name="hidden">
          </form>

        </div>
        </div><?php
      }?>
	</div>
	</div>
	<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 ml0 pl0 space0 pc" id="map"></div>
</div>



<?php
echo '
';
echo '</div>';
include'includes/foot.php';
}
?>
