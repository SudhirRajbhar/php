<!DOCTYPE html>
<html>
<head>
	<title>Patient Signup/Signin</title>
	<meta charset="utf-8">
<meta name="viewport" width="device-width" initial-scale='1'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
	a:hover {
		text-decoration: none;
	}
</style>
</head>
<body>
	<div class="container">
<div class="row mt-4">
	<div class="col-md-12">
<?php 
include("dbcon.php");
include("operation.php");
if (!empty($_SESSION['email']) || !empty($_SESSION['mob'])) {
	$email=$_SESSION['email'];
	$mob=$_SESSION['mob'];
$sql="select * from patient where email='$email' or mobile='$mob'";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))
{
	$pid=$r['pid'];
	$obj=new operation();
	$sql2="select * from schedule where pid=$pid";
	$p=$obj->selectall($sql2);
?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert"
	name="button">&times;</button>
<?php echo "Dear ".$r['name']." You are Now Logged In"; ?>
</div>

</div> </div></div> <div class="container-fluid"> <div class="row mt-4"> <div
class="col-md-3 text-uppercase "><h1>Welcome <span class="text-info"><?php echo $r['name']?><span></h1></div> <div
class="col-md-8"></div> <div class="col-md-1"> <a href="logout.php"><button class="btn
btn-outline-primary btn-block">LOGOUT</button></a> </div> </div> </div>

<div class="row mt-4">
	<div class="col-md-3">
		<ul class="nav nav-tabs flex-column text-center">
<li class="nav-item"><a href="bookappointment.php" class="nav-link">Book Appointment</a></li>
<li class="nav-item"><a href="viewschedule.php "class="nav-link">View Schedule</a></li>
<li class="nav-item"><a href="report.php" class="nav-link">View Report</a></li>
<li class="nav-item"><a href="transaction.php" class="nav-link">View Transaction</a></li>
		</ul>
	</div>
		<div class="col-md-8 p-4">
			<table class="table table-hover table-striped table-borderless">
	<tr><th>Token Id</th><th>Booking Id</th>
		<th>Doctor Id</th><th>Date Time</th>
		<?php while($a=mysqli_fetch_assoc($p))
		{ ?>
	</tr>
	<tr><td><?php echo $a['tokenid'] ?></td>
<td><?php echo $a['bookingid'] ?></td>
<td><?php echo $a['did'] ?></td>
<td><?php echo $a['datetime'] ?></td>
	</tr>
<?php } ?>
</table>



			</div>
				<div class="col-md-1"></div>
</div>
<div class="row">
	<div class="col-md-3" style="height:160px"></div>
		<div class="col-md-4 p-4">
			
		</div>
			<div class="col-md-4 p-4">
				
			</div>
				<div class="col-md-1"></div>
</div>
<div class="row">
	<div class="col-md-3"> 
<ul class="nav nav-tabs flex-column text-center">
<li class="nav-item"><a href="pupdatedetail.php" class="nav-link">Update Details</a></li>
<li class="nav-item"><a href="pchangepswd.php"class="nav-link">Change Password</a></li>
		</ul>
	</div>
		<div class="col-md-8">
		 </div>
		<div class="col-md-1"> </div>
</div>


<?php }} ?>
</body></html>