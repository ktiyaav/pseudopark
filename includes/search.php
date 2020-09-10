<?php
session_start();
?>

<?php
include'config.php';
$place =  mysqli_real_escape_string($con,$_GET['q']);
$query="SELECT * FROM parkdetails WHERE parkArea LIKE '%$place%'";
$result = mysqli_query($con,$query);
$row1 = mysqli_num_rows($result);
?>
<style>
.search-box2{
  position: absolute;
  max-height: 420px;
  overflow-y: scroll;
  border: 1.5px solid red;
  padding-left: 20px;
  font-size: 16px;
  font-weight:700;
  padding-bottom: 10px;
  width:59.7%;
  padding-top: 10px;
}
@media screen and (max-width:600px) {
  .search-box2{
    width:90.5%;
    margin-bottom: 40px;
  }

}
</style>
<?php
echo'<div class="search-box2">';
while($row = mysqli_fetch_array($result)){

echo '<a href="search.php?place='.$place.'&city='.$row['city'].'"><i class="fa fa-map-marker" style="color:red;"></i>&nbsp;'.$row['parkArea'].', '.$row['city'].'&nbsp;<i class="fa fa-arrow-circle-right" style="color:#000;"></i></a><br />';

}
if($row1 == 0){
  echo 'Sorry No Parking found in your desired place!';

}
echo'</div>';
?>
</body>
</html>
