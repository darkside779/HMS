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
<link id="theme-style" rel="stylesheet" href="css/dark-mode.css">
    <link rel="icon" href="img/htl.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Position the button at the top-right corner */
        .theme-toggle-btn {
            position: fixed; /* Fixed positioning to keep the button in place */
            top: 10px; /* Distance from the top */
            right: 10px; /* Distance from the right */
            z-index: 1000; /* Ensure it's on top of other elements */
            background-color: #fff; /* Background color */
            border: 2px solid #e1700f; /* Border color */
            border-radius: 50%; /* Rounded button */
            padding: 10px; /* Padding for the button */
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.4s;
            width: 40px; /* Width of the button */
            height: 40px; /* Height of the button */
        }

        .theme-toggle-btn:hover {
            background-color: #e1700f; /* Background color on hover */
            color: #fff; /* Text color on hover */
            border-color: #fff; /* Border color on hover */
        }

        .theme-toggle-btn i {
            font-size: 20px; /* Font size for the icon */
        }
    </style>
</head>
<body>
<button class="theme-toggle-btn" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </button>
    <script>
        function toggleTheme() {
            const themeStyle = document.getElementById('theme-style');
            const currentTheme = themeStyle.getAttribute('href');
            
            if (currentTheme === 'css/dark-mode.css') {
                themeStyle.setAttribute('href', 'css/light-mode.css');
            } else {
                themeStyle.setAttribute('href', 'css/dark-mode.css');
            }
        }
    </script>
<div class="top">
<h2><span style="font-size:34px;">&#x210B;</span> Management </h2>
</div>
<div class="lft">
<h2><img src="img/htl.png">
<h3 style="color:#888888;">
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
<li><a href="one.php">Dashboard</a></li>
<li><a href="reservation.php">&#128197; &nbsp;New Reservation</a></li>
<li><a href="allreservation.php">&#128197; &nbsp;All Reservations</a></li>
<li><a href="rooms.php">&#128719; &nbsp;Manage Rooms</a></li>
<li><a href="rooms.php" style="color:#fff;background:#e1700f;">&#128719; &nbsp;Add Room</a></li>
<li><a href="rooms.php">&#128719; &nbsp;Manage Rooms</a></li>
<li><a href="">Help</a></li>
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