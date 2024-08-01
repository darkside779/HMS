<?php
session_start();
$conn=mysqli_connect('localhost','root','','hotel');
if(!$conn){
	echo 'Error in Connection';
}
// Add new room
if(isset($_POST['add'])){
$a=$_POST['no'];
$b=$_POST['type'];
$ins="INSERT INTO `rooms`(`id`, `room_no`, `room_type`) VALUES (NULL,'$a','$b')";
$run=mysqli_query($conn,$ins);
if($run){
	echo'<script>alert("New Room Added");</script>';
	header('REFRESH:1;URL=rooms.php');
}else{
	echo"Room Not Added";
}
}
?>
<html>
<head>
<title>Reception| Rooms</title>
<link rel="stylesheet" href="css/style.css">
<link rel="icon" href="img/htl.png">
</head>
<body>
<div class="top">
<h2><span>H</span> Management </h2>
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
<li><a href="one.php">Dashboard</a></li>
<li><a href="reservation.php">&#128197; &nbsp;New Reservation</a></li>
<li><a href="allreservation.php">&#128197; &nbsp;All Reservations</a></li>
<li><a href="rooms.php">&#128719; &nbsp;Manage Rooms</a></li>
<li><a href="rooms.php" style="color:#fff;background:#e1700f;">&#128719; &nbsp;Add Room</a></li>
<li><a href="rooms.php">&#128719; &nbsp;Manage Rooms</a></li>
<li><a href="employee.php">&#128101; &nbsp; Employes</a></li>
</ul>
</div>
<div class="rgt">
<div class="add">
<h3>Add Room</h3><br>
<center>
<form action="" method="POST">
<label>Room Type</label><br>
<select name="type" class="inp" required>>
<option>Single</option>
<option>Duble</option>
<option>Triple</option>
<option>Suite</option>
</select><br><br>
<label>Room Type</label><br>
<input type="text" name="no" placeholder="Room No" class="inp" required><br><br>
<input type="submit" name="add" value="Add New Room" class="btn">
</form>
</div>
<a href="rooms.php" class="canc">Cancel</a>
</div>
</body>
</html>