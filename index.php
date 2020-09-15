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
    <input type="text" name="arr_text" placeholder="Имя Возраст Зарплата" title="Введите имя, возраст, зарплата через пробел">
    <input type="submit" name='button'>
    <input type="submit" name='button2'>
    <input type="submit" value='massive_arr_database' name='massive'>
    </form>
    <?php
    
    // COUNT 
    // $query = "SELECT COUNT(*) as count FROM testie WHERE id>0";
    // $result = mysqli_query($link, $query) or die(mysqli_error($link));
    // $count = mysqli_fetch_assoc($result);
    
    // var_dump($count);

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
    
    //PDO DATABASE

    //PDO EXIT;

    
    $button = $_POST['button'];
    $button2 = $_POST['button2'];
    $massive = $_POST['massive'];
    $text_arr = $_POST['arr_text'];
    mysqli_query($link, "SET NAMES'utf8'");


    // INSERT FOR DATABASE FROM testie 
    if(isset($button) == 1){
        $text = explode(' ', $text_arr);
        $query = "INSERT INTO testie SET names='$text[0]', age='$text[1]', salary='$text[2]'";
        mysqli_query($link, $query);
    }

    // INSERT FOR DATABASE FROM test ALTERNATIVE
    // if(isset($button) == 1){
    // $query = "INSERT INTO testie (names, age, salary) VALUES ('Михаил', 45, 2)";
    // mysqli_query($link,$query);
    // }

        //SELECT FOR DATABASE FROM TESTIE
    // if(isset($button2) == 1){
    //     $query = "SELECT * FROM testie WHERE names='руссич'";
    //    $result = mysqli_query($link, $query);
    //    for($data = []; $row = mysqli_fetch_assoc($result); $data = $row);
    //    var_dump($data);
    // }

    // DELETED FOR DATABASE FROM TESTIE
    // if(isset($button2) == 1){
    //     $i = 40;
    //     $a = $i + 7;
    //     for($i; $i <= $a; $i++){
    // $query = "DELETE FROM testie WHERE id='$i'";
    // mysqli_query($link, $query);
    //     }
    // }

    //UPDATE FOR DATABASE FROM TESTIE
    // if(isset($button2) == 1){
    //     $query = "UPDATE testie SET names='항문 스틱을 통과' WHERE id='48'";
    //     mysqli_query($link,$query);
    // }

    // ORDER BY 
    // if(isset($button2) == 1){
    //     $query = "SELECT * FROM testie WHERE id>0 ORDER BY age DESC";
    //     $result = mysqli_query($link,$query);
    //     for($data = []; $row = mysqli_fetch_assoc($result); $data = $row){
    //     var_dump($data);
    //     }
    // }

    // LIKE
    // if(isset($button2) == 1){
        // $query = "SELECT * FROM testie WHERE names LIKE '%과'";
    //     $result = mysqli_query($link, $query);
    //    var_dump(mysqli_fetch_assoc($result));
    // }

        if(isset($massive) == 1){
            if(isset($_GET['del'])){
                $del = $_GET['del'];
                $query = "DELETE FROM testie WHERE id='$del'";
                mysqli_query($link, $query);
            }
            $query = "SELECT * FROM testie WHERE id>0 ORDER BY age DESC ";
            $result = mysqli_query($link, $query);
            ?>
            <table border='1'>
            <tr>
            <th>id</th>
            <th>name</th>
            <th>age</th>
            <th>salary</th>
            <form method='post'>
            <th>deleted</th>
            </form>
            </tr>
            <?php
            // ALTERNATIVE VIVOD DATABASE
                // for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row){
                //     $query_deleted = "DELETE FROM testie WHERE id='$row[id]'";
                //     echo "<tr><td>$row[id]</td><td>$row[names]</td><td>$row[age]</td><td>$row[salary]</td><td>Удалить";
                //     echo '</td></tr>';
                // }

             

            for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
            $result = '';
            foreach($data as $elem){
                $result .= '<tr>';
                $result .= '<td>' . $elem['id'] .'</td>';
                $result .= '<td>' . $elem['names'] .'</td>';
                $result .= '<td>' . $elem['age'] .'</td>';
                $result .= '<td>' . $elem['salary'] .'</td>';
                $result .= '<td><a href="?del='.$elem['id'].'">Удалить</a></td>';
                $result .= '</tr>';
            }
            echo $result;
        }
  
    ?>
     </table>
</body>
</html>