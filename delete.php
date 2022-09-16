<?php
include('../include/dbconnection.php');

$id = $_GET["id"]??"";

$query = "delete from employees where id = '$id'";

$run = mysqli_query($con, $query);

if($run)
    {
        echo "<script> alert('Data has been Deleted Successfully..'); 
        window.location.href = 'Read.php';
        </script>";
        
    }
    else
    {
        echo "<script> alert('Data Deletion Failed..'); </script>";
    }
?>