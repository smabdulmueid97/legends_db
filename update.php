<?php
include('include/dbconnection.php');

$id = $_GET["id"]??"";

$query = "select * from employees where id = '$id'";
$row = mysqli_query($con, $query);
$data = mysqli_fetch_array($row);

?>

<!--null coalasce operator ??-->

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    
    <div class="container">
    
        <div class="row">
        
            <div class="col-md-4 mx-auto">
            
                <h1 class="jumbotron text-center bg-primary">Update Employee</h1>
                
                <form action="" method="post">
    
                    <input type="hidden" name="eid" value="<?php  echo $data[0]; ?>">
                    
        <input type="text" class="form-control" name="ename" id="" placeholder="Enter Name" value="<?php  echo $data[1]; ?>">
                    <br>
        <input type="number" class="form-control" min="10" max="60" name="eage" id="" placeholder="Enter Age" value="<?php  echo $data[2]; ?>">
                    <br>
        <input type="text" class="form-control" name="edesig" id="" placeholder="Enter Designation" value="<?php  echo $data[3]; ?>">
                    <br>
        <input type="text" class="form-control" name="esalary" id="" placeholder="Enter Salary" value="<?php echo $data[4]; ?>">
                    <br>
                    
        <input type="submit" value="Update" name="UpdateBtn" class="btn btn-primary btn-block">
        </form>
                
            </div>
        
        </div>
    
    </div>
    
    
      <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


<?php

if(isset($_POST['UpdateBtn']))
{
    $id = $_POST['eid'];
    $name = $_POST['ename'];
    $age = $_POST['eage'];
    $desig = $_POST['edesig'];
    $salary = $_POST['esalary'];
    
    $query = "UPDATE employees set name = '$name', age = '$age', designation = '$desig', salary = '$salary' where id = '$id'";
    
    $run = mysqli_query($con, $query);
    if($run)
    {
        echo "<script> alert('Data has been Updated Successfully..'); 
        window.location.href = 'Read.php';
        </script>";
        
    }
    else
    {
        echo "<script> alert('Data Updation Failed..'); </script>";
    }

    
    
}


?>
