
<?php
 $a=array("bhanu","Anuja","Shanu","Dheet");
 $b=array("bhanu"=>"62","Anuja"=>"26","Shanu"=>"52","Dheet"=>"32");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>doc</title>
</head>
<body>
    <table border="2" color="black">
        <tr>
        
            <th>Name</th>
            <th>Age</th>
        </tr>
            <?php
                    foreach ($a as $d=>$d_value)
                    {
                    ?>
                    <tr>
                        <td><?=$d?></td>
                        <td><?=$d_value?></td>
                    </tr>
                    <?php 
                    }
                ?>
            </tr>
        </table>

</body>
</html>
