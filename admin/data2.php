<?php
session_start();
$conn=mysqli_connect('localhost','root','','hotel');
if(!$conn){
	echo 'Error in Connection';
}
?>
<html>
<head>
<title>All Reservations</title>
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
if($_SESSION['recept']){
	$x=$_SESSION['recept'];
}
$conn=mysqli_connect('localhost','root','','hotel');
 $sqli="select * from recept where name='$x'";
     $result=mysqli_query($conn,$sqli);
     while($row=mysqli_fetch_array($result))
{
?>
<?php echo $row['status'];?>&nbsp;
<img src="img/online.png" style="width:20px;">
<?php } ?>
</h3>
</h2>
<hr><br>
<ul>
<li><a href="one.php">&#x1F3E0; &nbsp;Dashboard</a></li>
<li><a href="reservation.php">&#128197; &nbsp;New Reservation</a></li>
<li><a href="allreservation.php">&#128197; &nbsp;All Reservations</a></li>
<li><a href="rooms.php">&#128719; &nbsp; Manage Rooms</a></li>
<li><a href="employee.php" style="color:#fff;background:#e1700f;">&#128101; &nbsp;Employes</a></li>
</ul>
</div>
<div class="rgt">
<div class="add">
<h3>&#128101; &nbsp; / &nbsp;  Employes /&nbsp; Staff</h3><br>
</div>
<h2 align="center">Staff Details</h2>
<table width="99%" cellspacing="10">
<?php
if(isset($_GET['id'])){
$id=$_GET['id'];	
}
$sel="select * from staff where id='$id'";
$run=mysqli_query($conn,$sel);
while($row=mysqli_fetch_array($run)){
?>
<tr class="t2"><td>Employee Name</td><td><?php echo $row['emp_name']; ?></td></tr>
<tr class="t2"><td>Employee Phone</td><td>0<?php echo $row['Phone']; ?></td></tr>
<tr class="t2"><td>Employee Address</td><td><?php echo $row['address']; ?></td></tr>
<tr class="t2"><td>Shift</td><td><?php echo $row['shift']; ?></td></tr>
<tr class="t2"><td>Department</td><td><?php echo $row['emp_staff']; ?></td></tr>
<tr class="t2"><td>Salary</td><td><?php echo $row['salary']; ?>&nbsp; SDG</td></tr>
<?php } ?>
<center><a href="employee.php" class="canc" style="float:center">Back</a></center>

</table>
</div>
</body>
</html>