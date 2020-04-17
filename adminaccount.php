<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<?php
session_start();
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminlogin.php';</script>";
}
include("dbconnection.php");
include("headers.php");
?>

<strong>Admin Dashboard</strong>

<div class="container"><center>
  <p><form method="get" action=""><strong>Date -</strong> <input type="date" name="date" value="<?php echo $_GET[date]; ?>" ><input type="submit" name="submit" value="Submit"></form></p>
    <h1>Number of Appointment Records :     
    <?php
	$sql = "SELECT * FROM appointment WHERE status='Active'";
	if(isset($_GET[date]))
	{
		$sql = $sql . " AND appointmentdate ='$_GET[date]'";
	}
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h1>	
    
   
    <h1>Number of Patient Records : 
    <?php
	$sql = "SELECT * FROM patient WHERE status='Active'";
	if(isset($_GET[date]))
	{
		$sql = $sql . " AND admissiondate ='$_GET[date]'";
	}
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h1>    
    <br>
<hr>
    
    <h1 style="color:rgba(0,4,70,1.00)"> &nbsp; Database Records</h1>
   
   
    
  
    <h1>Number of Admin records :  
    <?php
	$sql = "SELECT * FROM admin WHERE status='Active'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h1>

     <h1>Number of Doctor Records : 
    <?php
	$sql = "SELECT * FROM doctor WHERE status='Active' ";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h1>
 
 
</div></center>
<?php
include("footers.php");
?>