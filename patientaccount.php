<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php
session_start();
include("dbconnection.php");
if(!isset($_SESSION['patientid']))
{
	echo "<script>window.location='patientlogin.php';</script>";
}
include("headers.php");

$sqlpatient = "SELECT * FROM patient WHERE patientid='$_SESSION[patientid]' ";
$qsqlpatient = mysqli_query($con,$sqlpatient);
$rspatient = mysqli_fetch_array($qsqlpatient);

$sqlpatientappointment = "SELECT * FROM appointment WHERE patientid='$_SESSION[patientid]' ";
$qsqlpatientappointment = mysqli_query($con,$sqlpatientappointment);
$rspatientappointment = mysqli_fetch_array($qsqlpatientappointment);
?><div class="w3-container">
    <h1> account: <?php echo $rspatient[patientname]; ?> </h1>
    <h1>You have Registered on <?php echo $rspatient[admissiondate]; ?> <?php echo $rspatient[admissiontime]; ?></h1>
<?php
if(mysqli_num_rows($qsqlpatientappointment) == 0)
{
?>
	<h1>Appointment records not found.. </h1>
<?php
}
else
{
?>    
	<h1>Last Appointment taken <br> <?php echo $rspatientappointment[appointmentdate]; ?><br> <?php echo $rspatientappointment[appointmenttime]; ?> </h1>
<?php
}
?>      
  </div>
<?php
include("footers.php");
?>