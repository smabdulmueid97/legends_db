<?php
include('include/dbconnection.php');

?>

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
            
                <h1 class="jumbotron text-center bg-primary">Add Employee</h1>
                
                <form action="" method="post">
    
        <input type="text" class="form-control" name="ename" id="" placeholder="Enter Name">
                    <br>
        <input type="number" class="form-control" min="10" max="60" name="eage" id="" placeholder="Enter Age">
                    <br>
        <input type="text" class="form-control" name="edesig" id="" placeholder="Enter Designation">
                    <br>
        <input type="text" class="form-control" name="esalary" id="" placeholder="Enter Salary">
                    <br>
                    
        <input type="submit" value="Insert" name="InsertBtn" class="btn btn-primary btn-block">
        </form>
                
            </div>
        
        </div>
    
    </div>
    
    
    
    
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php


if(isset($_POST['InsertBtn']))
{
    
    $name = $_POST['ename'];
    $age = $_POST['eage'];
    $desig = $_POST['edesig'];
    $salary = $_POST['esalary'];
    
    
    $query = "insert into employees (name, age, designation, salary) values('$name','$age','$desig','$salary')";
    
    $run = mysqli_query($con, $query);
    
    if($run)
    {
        echo "<script> alert('Data has been inserted Successfully..'); 
        window.location.href = 'Read.php';
        </script>";
        
    }
    else
    {
        echo "<script> alert('Data insertion Failed..'); </script>";
    }
    
}


?>


