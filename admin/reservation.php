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
    $j=$_POST['nit'];
	
	$chk= "select * from booking where cust_name= '$f' AND room_no='$b'";
	$run_chk=mysqli_query($conn,$chk);
	if(mysqli_num_rows($run_chk) > 0){
		echo '<script>alert("There Is A Reservation With The Same Room Data ");</script>';
	}else{
	
$ins="INSERT INTO `booking`(`cust_name`, `cust_phone`, `cust_address`, `cust_nic`, `room_no`, `room_type`,  `check_in`, `check_out`, `price`,`nit`)
VALUES ('$f','$g','$h','$i','$b','$a','$c','$d','$e','$j')";
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
<li><a href="reservation.php" style="color:#fff;background:#e1700f;">&#128197; &nbsp;New Reservation</a></li>
<li><a href="allreservation.php">&#128197; &nbsp;All Reservations</a></li>
<li><a href="rooms.php">&#128719; &nbsp;Manage Rooms</a></li>
<li><a href="employee.php">&#128101; &nbsp; Employes</a></li>
</ul>
</div>
<div class="rgt">
<div class="up">
<h3>&#128197; &nbsp; / &nbsp; Reservation</h3>
</div>
<br><br>
<div class="res">
<table width="99%" border="0" cellspacing="30">
<tr>
<td>
<form action="" method="POST">
<label>Select Room Type</label><br>
<select name="typ" class="in" required>
<?php
$c="SELECT * FROM `rooms_type` WHERE 1 ";
$runc=mysqli_query($conn,$c);
	if($runc){
	while($row = mysqli_fetch_array($runc)){
		echo '<option value="'.$row['type'].'">'.$row['type'].'</option>';
	}}
?>
</select></td>
<td>
<label>Select Room No</label><br>
<select name="no" class="in" required>
<?php
$c="SELECT * FROM `rooms` WHERE 1 ";
$runc=mysqli_query($conn,$c);
	if($runc){
	while($row = mysqli_fetch_array($runc)){
		echo '<option value="'.$row['room_no'].'">'.$row['room_no'].'</option>';
	}}
?>
</select>
</td>
</tr>
<tr>
<td>
<br><br><label>Check In Date</label><br>
<input type="date" name="in" class="in" required>
</td>
<td>
<br><br><label>Check Out Date</label><br>
<input type="date" name="out" class="in" required>
</td>
</tr>
<tr>
<td>
<br><br><label>Customer Nationality</label><br>
<input type="text" name="nit" placeholder="Example(sudanese,egeption,...)" class="in" required>
</td>
<td>
<br><br><label>National Identity Card</label><br>
<input type="text" name="card" class="in" placeholder="S1342V4567" required>
</td>
</tr>
<tr>
<td>
<br><br><label>Customer Full Name</label><br>
<input type="text" name="fname" class="in" placeholder="Full Name" required>
</td>
<td>
<br><br><label>Contact Number</label><br>
<input type="number" name="phone" class="in" placeholder="Contact No" required>
</td>
</tr>
<tr>
<td>
<br><br><label>Customer Address</label><br>
<input type="text" name="address" class="in" placeholder="Full Address" required>
</td>
<td>
<br><br><label>Day Price</label><br>
<input type="number" name="price" placeholder="Price SDG" class="in" required>
</td>
</tr>
<TR><TD><input type="submit" name="reserv" value="Booking" class="book"></TD></TR>
</form>
</table>
</div>
</div>