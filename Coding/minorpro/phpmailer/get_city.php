<?php
require_once("object.php");
if(!empty($_POST["statecode"])) 
{
$statecode=$_POST["statecode"];
$query1 =mysqli_query($con,"SELECT city_id,city_name FROM city 
	join state on state.state_id=city.state_id 
	join country on country.country_id =city.country_id 
	WHERE city.state_id = '$statecode'");
?>
<option value="">Select City</option>
<?php
while($row1=mysqli_fetch_array($query1))  
{
?>
<option value="<?php echo $row1["city_id"]; ?>"><?php echo $row1["city_name"]; ?></option>
<?php
}
}
?>
