<?php
include('include/dbconnection.php');

$query = "select * from employees";

if(isset($_GET['SearchBtn']))
{
    $searchBy = $_GET['SearchList'];
    $search_text = $_GET['SearchTxt'];
    
    if($searchBy == "Id")
    {
     $query = "select * from employees where id = '$search_text'";   
    }
    else if($searchBy == "Name")
    {
     $query = "SELECT * from employees WHERE name LIKE '%$search_text%'";   
    }
    else if($searchBy == "Designation")
    {
     $query = "select * from employees where designation = '$search_text'";   
    }
    else
    {
        echo "<script>alert('No Search Result Found.');</script>";
    }
    
    
}

$rows = mysqli_query($con, $query);
$Total_Rows = mysqli_num_rows($rows);
//echo $Total_Rows;
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
    
        
        <div class="row mt-3">
        
            <div class="col-md-3">
            
            <a href="Home.php" class="btn btn-outline-dark">Add New Employee</a>
            
            </div>
            
            <div class="col-md-8">
                
                <form action="" method="get" class="form-inline">
                           
                    <select name="SearchList" id="" required class="form-control">
                        <option value="">Select Field</option>
                        <option value="Id">Id</option>
                        <option value="Name">Name</option>
                        <option value="Designation">Designation</option>
                    </select>
                    <input type="text" placeholder="Search By " name="SearchTxt" required class="form-control">
                    
                    <input type="submit" value="Search" name="SearchBtn" class="btn btn-primary">
                    <a href="Read.php" class="btn btn-danger">Reset</a>
                        
                    
                </form>
            
            </div>
        
        </div>
        
        <div class="row mt-3">
        
            <div class="col-md-12">
    
    <?php
    
if($Total_Rows != 0)
{
    ?>
    
    <table class="table table-bordered table-striped table-hover table-dark">
        <thead>
        <tr>
            <th colspan="7" class="text-center">EMPLOYEE'S DATA</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>AGE</th>
            <th>DESIGNATION</th>
            <th>SALARY</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
    </thead>
    <?php
    echo "<tbody>";
    while($data = mysqli_fetch_assoc($rows))
    {
        echo "<tr>
            <td>".$data['id']."</td>
            <td>".$data['name']."</td>
            <td>".$data['age']."</td>
            <td>".$data['designation']."</td>
            <td>".$data['salary']."</td>
            <td><a href='update.php?id=$data[id]' class='btn btn-info'>Edit</a></td>
            <td><a href='delete.php?id=$data[id]' class='btn btn-danger' onclick='return Confirmation()'>Delete</a></td>
        </tr>";
    }
    echo "</tbody>";
}
else
{
    echo "No Rows Found";
}

    
    ?>
    </table>
                </div>
        
        </div>
    
    </div>
    
    <script>
    
    function Confirmation()
        {
            return confirm("Are You Sure To Delete Data ??");
        }
    
    </script>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>