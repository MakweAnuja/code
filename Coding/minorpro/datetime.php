<?php
$date   = new DateTime(); //this returns the current date time
$result = $date->format('Y-m-d-H-i-sa');
echo $result . "<br>";
$krr    = explode('-', $result);
$result = implode("", $krr);
echo $result;
echo '<br><br>';
$date   = new DateTime(); //this returns the current date time
$result = $date->format('Y-m-d-H-i-sp');
echo $result . "<br>";
$krr    = explode('-', $result);
$result = implode("", $krr);
echo $result;
?>