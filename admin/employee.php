<?php
session_start();
$conn=mysqli_connect('localhost','root','','hotel');
if(!$conn){
	echo 'Error in Connection';
}
if(isset($_POST['reserv'])){
	$a=$_POST['typ'];
	$b=$_POST['no'];
	$c=$_POST['in'];
	$d=$_POST['out'];
	$e=$_POST['price'];
	$f=$_POST['fname'];
	$g=$_POST['phone'];
	$h=$_POST['address'];
	$i=$_POST['card'];
	
	$chk= "select * from booking where cust_name= '$f' AND room_no='$b'";
	$run_chk=mysqli_query($conn,$chk);
	if(mysqli_num_rows($run_chk) > 0){
		echo '<script>alert("There Is A Reservation With The Same Room Data ");</script>';
	}else{
	
$ins="INSERT INTO `booking`(`cust_name`, `cust_phone`, `cust_address`, `cust_nic`, `room_no`, `room_type`,  `check_in`, `check_out`, `price`)
VALUES ('$f','$g','$h','$i','$b','$a','$c','$d','$e')";
$run=mysqli_query($conn,$ins);
if($run){
	echo '<script>alert("Booking Succeeded");</script>';
}else{
	echo "Cannot Booking Now";
}
}
}
?>
<html>
<head>
<title>Reservation</title>
<link rel="stylesheet" href="css/style.css">
<link rel="icon" href="img/htl.png">
</head>
<body>
<div class="top">
<h2><span style="font-size:34px;">&#x210B;</span> Management </h2>
</div>
<div class="lft">
<h2><img src="img/htl.png">
<h3 style="color:#fff;">
<?php
if($_SESSION['admin']){
	$x=$_SESSION['admin'];
}
$conn=mysqli_connect('localhost','root','','hotel');
 $sqli="select * from admins where name='$x'";
     $result=mysqli_query($conn,$sqli);
     while($row=mysqli_fetch_array($result))
{
?>
<?php echo $row['admin_name'];?>&nbsp;
<img src="img/online.png" style="width:20px;">
<?php } ?>
</h3>
</h2>
<hr><br>
<ul>
<li><a href="one.php">&#x1F3E0; &nbsp;Dashboard</a></li>
<li><a href="reservation.php">&#128197; &nbsp;New Reservation</a></li>
<li><a href="allreservation.php">&#128197; &nbsp;All Reservations</a></li>
<li><a href="rooms.php">&#128719; &nbsp;Manage Rooms</a></li>
<li><a href="employee.php" style="color:#fff;background:#e1700f;">&#128101; &nbsp; Employes</a></li>
</ul>
</div>
<div class="rgt">
<div class="add">
<h3>&#128101; &nbsp; / &nbsp;  Employes /&nbsp; Staff</h3>
<a href="addemp.php" class="btn">Add New Staff</a>
</div>
<br><br><BR><BR>
<table width="99%" cellspacing="10">
<tr class="t1">
<td>St.No</td>
<td>Employee Name</td>
<td>Staff</td>
<td>Shift</td>
<td>Joining Data</td>
<td>Salary</td>
<td>Action</td>
</tr>
<?php
$sel="select * from staff";
$run=mysqli_query($conn,$sel);
while($row=mysqli_fetch_array($run)){
	$id=$row['id'];
?>

</div>
<tr class="t2">
<td><?php echo $id; ?></td>
<td><?php echo $row['emp_name']; ?></td>
<td><?php echo $row['emp_staff']; ?></td>
<td><?php echo $row['shift']; ?></td>
<td><?php echo $row['join_date']; ?></td>
<td><?php echo $row['salary']; ?></td>
<td>
<a href="data2.php?id=<?php echo $id; ?>" class="a1">&#x1F441;</a>
&nbsp;&nbsp;&nbsp;
<a href="employee.php?delete=<?php echo $id; ?>" onclick="return confirm('Are you Sure?')" class="a2">
&#128465;</a>
</td>
</tr>
<?php } ?>
</table>
</div>
<?php
$conn=mysqli_connect("localhost","root","","hotel");
if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	mysqli_query($conn, "DELETE FROM staff WHERE id='$id'");
	header("location:employee.php");
}

?>
</body>
</html>