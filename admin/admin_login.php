<?php
session_start();
include '../includes/db-connection.php';
$login_err="";
$userId="";
if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
    $login="SELECT * FROM admin WHERE username='$username' AND pwd='$pwd'";
    $result=mysqli_query($connect,$login);
    while ($row=mysqli_fetch_array($result)){
        $userId=$row['id'];
    }
    if(mysqli_num_rows($result)==1){
		$_SESSION['admin']=$username;
		$_SESSION['adminuserId']=$userId;
		header("Location:index.php");
	}
	else
	{
		$login_err="<div class='alert alert-danger'id='alert'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Incorrect Username and Password</div>";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
	<link type="text/css"rel="stylesheet"href="../css/bootstrap.min.css"/>
	
</head>
<body>
<div class="container">
	<div class="row" style="margin-top: 20px;">
		<div class="col-sm-3">
			
		</div><!--End of col-->
		<div class="col-sm-6">
			<div class="panel">
				<div class="panel-heading">
					<center><img src="../img/admin_login.gif"/></center>
				</div><!--End of panel-heading-->
				<div class="panel-body">
					<form method="POST"action="admin_login.php"class="form-horizontal">
				<div class="form-group">
					<label class="label-control col-sm-3">Username</label>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text"name="username"class="form-control"placeholder="Enter username"/>
						</div><!--End of input group-->
					</div><!--End of col-->
				</div><!--end of form group-->
				<div class="form-group">
					<label class="label-control col-sm-3">Password</label>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password"name="pwd"class="form-control"placeholder="Enter password"/>
						</div><!--End of input group-->
					</div><!--End of col-->
				</div><!--end of form group-->
				<div class="form-group">
					<label class="label-control col-sm-3"></label>
					<div class="col-sm-9">
						<input type="submit"name="login"value="Login"class="btn btn-success"/>
					</div><!--End of col-->
				</div><!--end of form group-->
			</form>
				</div><!--End of panel body-->
				<?php echo $login_err;  ?>
			</div><!--End of panel-->
		</div><!--End of col-->
	</div><!--End of row-->
</div><!--end of container-->
	<script type="text/javascript"src="../jquery-1.11.1.min.js"></script>
	<script type="text/javascript"src="../js/bootstrap.min.js"></script>
</body>
</html>