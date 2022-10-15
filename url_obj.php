<?php   
$url = "https://betsapi.com/docs/samples/bwin_inplay.json";   
$ch = curl_init();   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
curl_setopt($ch, CURLOPT_URL, $url);   
$res = curl_exec($ch);   
$re=json_decode($res,true);
echo("<pre>");
print_r($re);

echo $res;   
?>  