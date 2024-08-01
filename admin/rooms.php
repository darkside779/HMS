<?php
session_start();
$conn=mysqli_connect('localhost','root','','hotel');
if(!$conn){
	echo 'Error in Connection';
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
<li><a href="rooms.php" style="color:#fff;background:#e1700f;">&#128719; &nbsp; Manage Rooms</a></li>
<li><a href="employee.php">&#128101; &nbsp; Employes</a></li>
</ul>
</div>
<div class="rgt">
<div class="add">
<h3>&#128719; &nbsp;/&nbsp; Manage Rooms</h3>
<a href="addroom.php" class="btn">Add New Room</a>
</div>
<BR><BR><BR><BR>
<table width="99%" cellspacing="10">
<tr class="t1">
<td>Room No</td>
<td>Room Type</td>
<td>Status</td>
<td>In</td>
<td>Out</td>
<td>Action</td>
</tr>
<?php
$sel="select * from rooms";
$run=mysqli_query($conn,$sel);
while($row=mysqli_fetch_array($run)){
?>
<tr class="t2">
<td><?php echo $row['room_no']; ?></td>
<td><?php echo $row['room_type']; ?></td>
<td></td>
<td></td>
<td></td>
<td>
<a href="" class="a1">&#9998;</a>
&nbsp;&nbsp;&nbsp;
<a href="" class="a2">&#128465;</a>
</td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>