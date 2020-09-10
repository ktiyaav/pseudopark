<?php
session_start();
$title = "Search Results";
include'includes/head.php';
echo'<div class="content-search">';
$vehicle = "bike";
$place =  mysqli_real_escape_string($con,$_GET['place']);
$_SESSION['place'] =  mysqli_real_escape_string($con,$_GET['place']);
$date = date('d M yy');
$seconds = time();
$rounded_seconds = round($seconds / (30 * 60)) * (30 * 60);
$time= date('d M y H:i', $rounded_seconds);
$time =  date("g:iA", strtotime($time));
$date2 =date('d M yy', strtotime($date. ' + 1 days'));
?>
<div class="container-main">
  <form action="includes/`fetch`_parking.php" style="display: inline;" onchange="fromResult(from.value,to.value,vehicleType.value)" autocomplete="off">
    <div class="row search-wrap">
        <div class="col-12 col-lg-5">
			<div class="row">
				<div class="col-5 date-head space0">Arrive After</div>
				<div class="col-2 date-head space0"><i class="fa fa-long-arrow-right arrow-right" aria-hidden="true"></i></div>
				<div class="col-5 date-head space0">Exit Before</div>
			</div>
			<div class="row">
				<div class="col-5 space0">
					<div class='datechos input-group date' id='datetimepicker6' style="display: inline;">
						<div class="inline" id="date-from" value=""><?php echo $date.' '.$time;?></div>&nbsp;
						<input type='text' style="display:none;" name="from" class="" required />
						<span class="input-group-addon"><span class="fa fa-pencil calendar-icon"></span></span>
					</div>
				</div>
				<div class="col-2 date-head  space0"></div>
				<div class="col-5 space0">
					<div class='input-group date' id='datetimepicker7' style="display: inline;">
						<div class="inline" id="date-to"><?php echo $date2.' '.$time;?></div>&nbsp;
						<input type='text' style="display:none;" name="to" class="" required />
						<span class="input-group-addon"><span class="fa fa-pencil calendar-icon"></span></span>
					</div>
				</div>
			</div>
		</div>
    </div>
<?php

if(isset($_GET['city'])){
		$city = $_GET['city'];
		$_SESSION['city'] = $_GET['city'];
		$query = "SELECT * FROM parkdetails WHERE city = '$city' AND `parkArea` LIKE '$place%' AND $vehicle >0";
    $map = mysqli_query($con,"SELECT * FROM parkdetails WHERE `parkArea` LIKE '$place%' AND city = '$city'");
}else{
  $query = "SELECT * FROM parkdetails WHERE `parkArea` LIKE '$place%' AND $vehicle >0";
  $map = mysqli_query($con,"SELECT * FROM parkdetails WHERE `parkArea` LIKE '$place%'");
}
  $raw_results = mysqli_query($con,$query) or die(mysqli_error($con));
  //Latitude & Longitude for Map center
  $map = mysqli_fetch_assoc($map);
  $_SESSION['lat'] = $map['lat'];
  $_SESSION['lng'] = $map['lng'];
  if (mysqli_num_rows($raw_results) > 0) { ?>
  <div class="row">
      <div class="col-lg-6 col-sm-12 col-md-6 col-12 mr0 pr0 space0">
      <div class="scroll-area">
  		<div class="searchInfo">
  			<div class="row">
  				<div class="col-md-8 col-7">
  					<div class="title">Parking Near</div>
            <div class=""><?php if(isset($city)){echo $city;}else{echo $place;}?><br /></div>
  				</div>
  				<div class="col-md-4 col-5 vehicle-selector">
  					<label for="radio--03">
              <input type="radio" id="radio--03" name="vehicleType"checked value="bike">
              <span><i class="fa fa-motorcycle" aria-hidden="true"></i></span>
            </label>
  					<label for="radio--04">
  						<input type="radio" id="radio--04" name="vehicleType" value="car">
              <span><i class="fa fa-car" aria-hidden="true"></i></span>
            </label>
  					<label for="radio--05">
              <input type="radio" id="radio--05" name="vehicleType" value="bus">
              <span><i class="fa fa-bus" aria-hidden="true"></i></span>
            </label>
  				</div>
  			</div>
  			<div class="row pb-10">
  				<div class="col-md-8 col-6 city-name">

        </div>
  			</div>
  		</div>
  </form>

  <form action="book.php" style="display: inline;">

    <div class="container-main">
  		<div id="searchResult">
  		<?php
      while($results = mysqli_fetch_array($raw_results)){
  			$total = $results[$vehicle];
  			$id = $results['parkId'];
  			$total = $results[$vehicle];
  			$SQLfrom = date("yy-m-d h:i:s", strtotime("$date"));
  			$SQLto = date("yy-m-d h:i:s", strtotime("$date2"));
  			$noOfBoking = mysqli_num_rows(mysqli_query($con,"SELECT * FROM booking WHERE parkId = $id AND vehicle = '$vehicle' AND  dateFrom>='$SQLfrom' AND dateTo <='$SQLto'	"));
  			if($total>$noOfBoking){

  			?>
  			<div class="list">
  				<div class="listing-container row" id="" style="border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">
  					<div class="col-md-3 col-4">
  						<img src="images/parking/<?php echo $results['image'];?>" alt="<?php echo $results['parkName'];?>">
  					</div>

  					<div class="listing-details col-md-8 col-8">
  						<div class="row listing-content pt10">
  							<div class="col-md-8 col-7 space0">
  								<div class="parking-name"><?php echo $results['parkName'];?></div>
  								<div class="address"><?php echo $results['parkAddress'];?></div>
  							</div>
  							<div class="col-md-4 col-5 text-right">
  								<div class="listing-price"><sup>₹</sup><?php echo $results[$vehicle.'Price'];?></div>
  							</div>
  						</div>
  						<div class="row">
  							<div class="col-7 space0">
  							<div class="booking-button-wrapper">
  							<a class="btn btn-primary null" name="book" href="book.php?place=<?php echo $place;?>&city=<?php if(isset($city)){echo$city;}?>&id=<?php echo $results['parkId'];?>&type=<?php echo$vehicle;?>&from=<?php if(isset($from)){echo$from;}else{echo $date.' '.$time;}?>&to=<?php if(isset($to)){echo$to;}else{echo $date2.' '.$time;}?>">Book Now</a>
  							</div>
  							</div>
  							<div class="col-5">
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
			<?php }} ?>
		</div>
		</div>
	</form>
    </div>
    </div>
	<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 ml0 pl0 pc" id="map"></div>
</div>

<div class="icon-bar">
  <a href="index.php"><img src="images/home.webp" width="30" /></a>
    <a href="index.php"><img src="images/search.png" width="30" /></a>
  <a href="" data-toggle="modal" data-target="#modalLRForm"><img src="images/me.png" width="30" /></a>
</div>
<?php
} else { ?>
<div class="row">
    <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 mr0 pr0">
    <div class="scroll-area">
  		<div class="searchInfo">
  			<div class="row">
  				<div class="col-8">
  					<div class="title">Parking Near</div>
  				</div>
  				<div class="col-4 pl0 text-right" style="text-align: right;">
  					<div class="monthly-check">
  						Show Monthly Parking
  					</div>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col-8 city-name"><?php if(isset($city)){echo $city;}else{echo $place;}?></div>
  				<div class="col-4 vehicle-selector text-right">
  					<label for="radio--03">
                          <input type="radio" id="radio--03" name="vehicleType" value="bike">
                          <span><i class="fa fa-car" aria-hidden="true"></i></span>
                      </label>
  					<label for="radio--04">
  						<input type="radio" id="radio--04" name="vehicleType" value="car">
                          <span><i class="fa fa-motorcycle" aria-hidden="true"></i></span>
                      </label>
  					<label for="radio--05">
                          <input type="radio" id="radio--05" name="vehicleType" value="bus">
                          <span><i class="fa fa-bus" aria-hidden="true"></i></span>
                      </label>
  				</div>
  			</div>
  		</div>
		  <br>
  		<div class="container">
  			<div class="row">
  				<div class="col-12">
  				<h3>No Parking Slot Found</h3><h4><a href="search.php?city=<?php echo $city;?>&vehicleType=<?php echo $vehicle;?>&place=">Click Here to See all Parking in your cities.</a></h4>
  				</div>
  			</div>
  		</div>

	   </div>
    </div>
	<div id="map" class="col-lg-6 col-sm-12 col-md-6 col-xs-12 ml0 pl0 space0 pc">
  </div>

</div>

<div class="icon-bar">
  <a href="index.php"><img src="images/home.webp" width="30" /></a>
    <a href="index.php"><img src="images/search.png" width="30" /></a>
  <a href="" data-toggle="modal" data-target="#modalLRForm"><img src="images/me.png" width="30" /></a>
</div>
<?php
}
echo '
';
echo '</div>';
echo '</div>';
include'includes/foot.php';
?>
