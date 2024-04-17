<?php
require_once ("../storage/sql_connect.php");

$user = $mysqli ->query('INSERT ');

if($result = mysqli_query($mysqli, $user)){
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

    }
    mysqli_free_result($result);
  } else{
    echo "NOT FOUND";
}
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}



?>