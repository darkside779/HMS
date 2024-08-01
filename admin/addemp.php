<?php
session_start();
$conn=mysqli_connect('localhost','root','','hotel');
if(!$conn){
	echo 'Error in Connection';
}
// Add new room
if(isset($_POST['add'])){
$a=$_POST['name'];
$b=$_POST['staff'];
$c=$_POST['phone'];
$d=$_POST['email'];
$e=$_POST['address'];
$f=$_POST['shift'];
$g=$_POST['join'];
$h=$_POST['salary'];
$ins="INSERT INTO `staff`( `emp_name`, `emp_staff`, `Phone`, `email`, `address`, `shift`, `join_date`, `salary`) 
VALUES ('$a','$b','$c','$d','$e','$f','$g','$h')";
$run=mysqli_query($conn,$ins);
if($run){
	echo'<script>alert("New Employee Added");</script>';
	header('REFRESH:1;URL=employee.php');
}else{
	echo"Employee Not Added";
}
}
?>
<html>
<head>
<title>Staff| New Employee</title>
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
<li><a href="employee.php">&#128101; &nbsp; Employes</a></li>
<li><a href="addemp.php" style="color:#fff;background:#e1700f;">&#128101; &nbsp; New Employes</a></li>
</ul>
</div>
<div class="rgt">
<div class="add">
<h3>Add Room</h3><br>
<center>
<form action="" method="POST">
<input type="text" name="name" placeholder="Employee Name" class="inp" required><br><br>
<input type="number" name="phone" placeholder="Employee Phone" class="inp" required><br><br>
<input type="email" name="email" placeholder="Employee Email" class="inp" required><br><br>
<input type="text" name="address" placeholder="Employee Address" class="inp" required><br><br>
<input type="text" name="join" placeholder="Employee Joining Date" class="inp" required><br><br>
<input type="number" name="salary" placeholder="Employee Salary" class="inp" required><br><br>
<label>Shift</label><br>
<select name="shift" class="inp" required>
<option>Evening - 4:00 PM - 11:00 PM</option>
<option>Night - 12:00 AM - 8:00 AM</option>
<option>Morning - 9:00 AM - 3:00 PM</option>
</select><br><br>
<label>Staff</label><br>
<select name="staff" class="inp" required>>
<option>Manager</option>
<option>Front Desk Receptionist</option>
<option>Housekeeping Manager</option>
<option>Cheif</option>
<option>Waiter</option>
</select><br><br>


<input type="submit" name="add" value="Add New Room" class="btn">
</form>
</div>
<a href="employee.php" class="canc">Cancel</a>
</div>
</body>
</html>