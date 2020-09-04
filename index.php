<?php
include  "connect.php";
$connect = new host();
$link = mysqli_connect($connect->host, $connect->user, $connect->password, $connect->db_name);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
    $sql = "CREATE DATABASE testbase_2";
    if(mysqli_connect_error($link)){
      die( "Faiild connect to Database " . mysqli_connect_error());
    }

    if(mysqli_query($link,$sql)){
      echo "Database created succesfully";
    }else{
     echo "Error" . mysqli_error($link);
    }
    mysqli_close($link);
    ?>
</body>
</html>