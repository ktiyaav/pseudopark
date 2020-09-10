<?php
session_start();
include'config.php';
$from = $_GET['from'];
$to = $_GET['to'];
$vehicle=$_GET['vehicleType'];

$city = $_SESSION['city'];
$place = $_SESSION['place'];
if($_GET['vehicleType'] == NULL){
	$vehicle="bike";
}

$query="SELECT * FROM parkdetails WHERE city = '$city' AND `parkArea` LIKE '$place%' AND $vehicle >0";
$raw_results = mysqli_query($con,$query) or die(mysqli_error($con));

	while($results = mysqli_fetch_array($raw_results)){
			$total = $results[$vehicle];
			$id = $results['parkId'];
			$SQLfrom = date("yy-m-d h:i:s", strtotime("$from"));
			$SQLto = date("yy-m-d h:i:s", strtotime("$to"));
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
			<?php }} ?>
</body>
</html>
