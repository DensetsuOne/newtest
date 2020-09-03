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
    
      $result = mysqli_query($link, "SELECT * FROM testie") or die(mysqli_error($link ));
      $result_2 = mysqli_fetch_assoc($result);
      var_dump($result_2);
      mysqli_query($link, "INSERT INTO testie SET names='Vycheslavy', age='28' salary='50000' ");
    
    ?>
</body>
</html>