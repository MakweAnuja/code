<?php
require_once("object.php");
if(!empty($_POST["coutrycode"])) 
{
$query =mysqli_query($con,"SELECT * FROM state WHERE country_id = '" . $_POST["coutrycode"] . "'");
?>
<option value="">Select State</option>
<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["state_id"]; ?>"><?php echo $row["state_name"]; ?></option>
<?php
}
}
?>