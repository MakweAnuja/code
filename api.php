<?php   
$url = "https://cisswork.com/Android/VidaFacil/process.php?action=vehicle_category";   
$ch = curl_init();   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
curl_setopt($ch, CURLOPT_URL, $url);   
$res = curl_exec($ch);   
$re=json_decode($res,true);
echo("<pre>");
print_r($re);

// echo $res;   
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Image</th>
        </tr>
        <?php
        for($i=0;$i<count($re);$i++)
        {
        ?>
        <tr>
            <td><?=$re[$i]['id']?></td>
            <td><?=$re[$i]['service_name']?></td>
            <td><?=$re[$i]['image']?></td>

        </tr>
        <?php
             } ?>
    </table>
</body>
</html>