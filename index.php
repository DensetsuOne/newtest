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
    <input type="submit" name='button2'>
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
    $button2 = $_POST['button2'];
    mysqli_query($link, "SET NAMES'utf8'");
    if(isset($button) == 1){
    $query = "INSERT INTO testie SET names='Руссич', age='300', salary='5000'";
    mysqli_query($link,$query);
    }

    if(isset($button2) == 1){
        $query = "SELECT * FROM testie WHERE names='руссич'";
       $result = mysqli_query($link, $query);
       for($data = []; $row = mysqli_fetch_assoc($result); $data = $row);
       echo $result['names'];
    }
    ?>
</body>
</html>