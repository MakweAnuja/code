

<?php
// $date=date_create("2018-05-10T11:06:50.663Z");
// echo date_format($date,"Y/m/d H:i:s");

$date=date_create("1525950445");
$date = date('d-m-y h:i:s');
echo($date);

echo "<br>";
$date1=date_create("2000-03-25");
$date2=date_create("2013-12-12");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");
?>
