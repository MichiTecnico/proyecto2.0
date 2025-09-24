<?php

include "main.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $sql_delete = " DELETE FROM personal WHERE id = $id";
    $result = mysqli_query($con, $sql_delete);
    header('location:../admin/tecnologia.php');

}


?>