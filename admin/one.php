<?php
session_start();

?>
<html>
<head>
<title>Home Page</title>
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
<li><a href="one.php" style="color:#fff;background:#e1700f;">&#x1F3E0; &nbsp;Dashboard</a></li>
<li><a href="reservation.php">&#128197; &nbsp;New Reservation</a></li>
<li><a href="allreservation.php">&#128197; &nbsp;All Reservations</a></li>
<li><a href="rooms.php">&#128719; &nbsp;Manage Rooms</a></li>
<li><a href="employee.php">&#128101; &nbsp; Employes</a></li>
</ul>
</div>
<div class="rgt">
<div class="up">
<h3>&#x1F3E0; &nbsp; / &nbsp; Dashboard</h3>
</div>
<br><br>
<div class="box">
<div class="card">
<h2>&#128719;<br>Rooms</h2><br><br><br>
<?php
$query="select id from rooms";
$st=mysqli_prepare($conn,$query);
mysqli_stmt_execute($st);
mysqli_stmt_bind_result($st,$id);
mysqli_stmt_store_result($st);
$cunt=mysqli_stmt_num_rows($st);
?>
<hr><h3><?php echo $cunt;?>&nbsp; Room</h3><hr>
</div>
<div class="card">
<h2>&#128197;<br>Books</h2><br><br><br>
<?php
$query="select bookin_id from booking";
$st=mysqli_prepare($conn,$query);
mysqli_stmt_execute($st);
mysqli_stmt_bind_result($st,$bookin_id);
mysqli_stmt_store_result($st);
$cunt=mysqli_stmt_num_rows($st);
?>
<hr><h3><?php echo $cunt;?>&nbsp; Bookings</h3><hr>
</div>
<div class="card">
<h2>&#128101;<br>Employees</h2><br><br><br>
<?php
$conn=mysqli_connect('localhost','root','','hotel');
$query="select id from staff";
$st=mysqli_prepare($conn,$query);
mysqli_stmt_execute($st);
mysqli_stmt_bind_result($st,$id);
mysqli_stmt_store_result($st);
$cunt=mysqli_stmt_num_rows($st);
?>
<hr><h3><?php echo $cunt;?>&nbsp; Employees</h3><hr>
</div>

<div class="card">
<h2>&#128719;<br>Salary(Outcomes)</h2><br><br><br>
<?php
$sal="select  sum(salary) from staff";
$runsal=mysqli_query($conn,$sal);
 while($row=mysqli_fetch_array($runsal)){

?>
<hr><h3><?php echo $row['sum(salary)'];?>&nbsp; SDG</h3><hr>
</div>
<div class="card">
<h2>&#128719;<br>Total Income</h2><br><br><br>
<?php
$sal="select  sum(price) from booking";
$runsal=mysqli_query($conn,$sal);
 while($row=mysqli_fetch_array($runsal)){
	$pp=$row['sum(price)']; 
	

?>
<hr><h3><?php echo $pp ?>&nbsp; SDG</h3><hr>
</div>
</div>
 <?php }} ?>
</div>
</body>
</html>