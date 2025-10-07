<?php

include "main.php";


if(isset($_GET['id'])){

    $id = $_GET['id'];
    $sql_status = "UPDATE personal SET status = CASE WHEN status = '1' THEN '0' WHEN status = '0' THEN '1' ELSE status END WHERE id = $id";
    $result = mysqli_query($con, $sql_status);
    header('location:../admin/tecnologia.php');
    exit();
}

?>