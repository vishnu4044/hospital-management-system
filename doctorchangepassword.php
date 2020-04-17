<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	$sql = "UPDATE doctor SET password='$_POST[newpassword]' WHERE password='$_POST[oldpassword]' AND doctorid='$_SESSION[doctorid]'";
	$qsql= mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Password has been updated successfully..');</script>";
	}
	else
	{
		echo "<script>alert('Failed to update password..');</script>";		
	}
}
?>


   
   <form method="post" action="" name="frmdoctchangepass" onSubmit="return validateform()">
    <table class="w3-table">
      <tbody>
        <tr>
          <td width="34%">Old Password</td>
          <td width="66%"><input type="password" name="oldpassword" id="oldpassword" /></td>
        </tr>
        <tr>
          <td>New Password</td>
          <td><input type="password" name="newpassword" id="newpassword" /></td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td><input type="password" name="password" id="password" /></td>
        </tr>
        <tr>
          <td height="36" colspan="2" align="center"><input type="submit" class="btn btn-success"  name="submit" id="submit" value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>

<script type="application/javascript">
function validateform1()
{
	if(document.frmdoctchangepass.oldpassword.value == "")
	{
		alert("Old password should not be empty..");
		document.frmdoctchangepass.oldpassword.focus();
		return false;
	}
	else if(document.frmdoctchangepass.newpassword.value == "")
	{
		alert("New Password should not be empty..");
		document.frmdoctchangepass.newpassword.focus();
		return false;
	}
	else if(document.frmdoctchangepass.newpassword.value.length < 8)
	{
		alert("New Password length should be more than 8 characters...");
		document.frmdoctchangepass.newpassword.focus();
		return false;
	}
	else if(document.frmdoctchangepass.newpassword.value != document.frmdoctchangepass.password.value )
	{
		alert(" New Password and confirm password should be equal..");
		document.frmdoctchangepass.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
