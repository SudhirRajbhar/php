<?php 
include("operation.php");
$obj=new operation();
if (isset($_POST['submit'])) {
	
	$dname=$_POST['dname'];
	$email=$_POST['email'];
	$mob=$_POST['mob'];
	$qly=$_POST['qly'];
	$exp=$_POST['exp'];
$sql="insert into doctor(name,email,mob,qly,exp) values('$dname','$email','$mob','$qly','$exp')";
if($obj->signup($sql))
{
		setcookie("docadd","Doctor Added Successfully",time()+60);
	header("location:adddoc.php");
}
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Doctor</title>
	<?php include"externalfiles.php"; ?>
</head>
<body class="bg-light">
<div class="container-fluid">
	<div class="row mt-4">
		<div class="col-md-10"></div>
<div class="col-md-2">
	<a href="doc.php"><button class="btn btn-outline-primary">BACK</button></a>

</div>
	</div>
	<hr>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<?php 
if(!empty($_COOKIE['docadd']))
{
 ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert"
	name="button">&times;</button>
<?php echo $_COOKIE['docadd']; ?>
</div>

<?php } ?>
		</div>
<div class="col-md-4"></div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 ">

		<div class="display-4 text-center">ADD DOCTOR</div>
			<form class="m-4 border p-4" action="" method="post">

<div class="form-group">
<input type="text" name="dname" class="form-control" placeholder="Full Name">
</div>
<div class="form-group">
<input type="email" name="email" class="form-control" placeholder="Email Id">
</div>
<div class="form-group">
<input type="text" name="mob" class="form-control" placeholder="Mobile No.">
</div>
<div class="form-group">
<input type="text" name="qly" class="form-control" placeholder="Qualification">
</div>
<div class="form-group">
<input type="text" name="exp" class="form-control" placeholder="Experience">
</div>

<button type="submit" name="submit" class='btn btn-outline-info btn-block '>ADD DOC</button> </form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

</body>
</html>