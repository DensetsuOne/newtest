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
    <form method='post'>
    <input type="submit" name='button'>
    </form>
    <?php
    //PROCEDURE DATABASE;

    // $sql = "CREATE DATABASE testbase_2";
    // if(mysqli_connect_error($link)){
    //   die( "Faiild connect to Database " . mysqli_connect_error());
    // }

    // if(mysqli_query($link,$sql)){
    //   echo "Database created succesfully";
    // }else{
    //  echo "Error" . mysqli_error($link);
    // }
    // mysqli_close($link);
    
    //PDO DATABASE;
 


    // INSERT FOR DATABASE FROM test 
    $button = $_POST['button'];
    if(isset($button) == 1){
    $query = "INSERT INTO testie SET names='Flower', age='300', salary='5000'";
    $result = mysqli_query($link,$query);
    }
    ?>
</body>
</html>