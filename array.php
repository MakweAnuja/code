<?php
$numbers=array(4,2,6,10,8,20,22,24,28,26);
sort($numbers);
$arr=count($numbers);
for ($num=0;$num<$arr;$num++)
{
    echo($numbers[$num]);
    echo("<br>");
}
echo("<br>");echo("<br>");
$numbers=array(4,2,6,10,8,20,22,24,28,26);
rsort($numbers);
$arr=count($numbers);
for($x=0;$x<$arr;$x++)
{
    echo($numbers[$x]);
    echo("<br>");
}

$a=array("B"=>"62","Anuja"=>"26","Shanu"=>"52","Dheet"=>"32");
asort($a);
$ar=count($a);
foreach($a as $y=>$y_value)
{
    echo("Key: ".$y ." Value: ".$y_value);
    echo "<br>";
}

echo "<br>";
echo "<br>";

$a=array("B"=>"62","Anuja"=>"26","Shanu"=>"52","Dheet"=>"32");

ksort($a);
$aw=count($a);
foreach($a as $z=>$z_value)
{
    echo("key= ".$z ."Value= ".$z_value);
    echo "<br>";

}
echo "<br>";

$a=array("B"=>"62","Anuja"=>"26","Shanu"=>"52","Dheet"=>"32");
krsort($a);
$wa=count($a);
foreach($a as $r=>$r_value)
{
    echo("key= ".$r."Value".$r_value);
    echo "<br>";

}
echo "<br>";
echo "<br>";

$a=array("B"=>"62","Anuja"=>"26","Shanu"=>"52","Dheet"=>"32");
arsort($a);
$wa=count($a);
foreach($a as $r=>$r_value)
{
    echo("key= ".$r."Value".$r_value);
    echo "<br>";}
    echo "<br>";

    //Array Functions//

    $a=array("bhanu"=>"62","Anuja"=>"26","Shanu"=>"52","Dheet"=>"32");
    print_r(array_change_key_case($a,CASE_LOWER));
    echo "<br>";
    print_r(array_change_key_case($a,CASE_UPPER));
    echo "<br>";

    $a=array("A"=>"62","b"=>"26","S"=>"52","p"=>"32");
    print_r(array_change_key_case($a,CASE_LOWER));
    echo "<br>";
    print_r(array_change_key_case($a,CASE_UPPER));
    echo "<br>";
    echo "<br>";

    $a=array("bhanu"=>"62","Anuja"=>"26","Shanu"=>"52","Dheet"=>"32");
    echo "<pre>";
    // print_r(array_chunk($a,4));
    foreach ($a as $d=>$d_value)
    {
        print_r($a);
    }
    
  

    






?>