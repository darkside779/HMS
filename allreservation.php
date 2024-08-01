<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'hotel');
if (!$conn) {
    echo 'Error in Connection';
    exit();
}
?>
<html>
<head>
    <title>All Reservations</title>
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
    <h2><span style="font-size:34px;">&#x210B;</span> Management</h2>
</div>
<div class="lft">
    <h2><img src="img/htl.png">
    <h3 style="color:#888888;">
        <?php
        if (isset($_SESSION['recept'])) {
            $x = $_SESSION['recept'];
            $sqli = "SELECT * FROM recept WHERE name=?";
            $stmt = mysqli_prepare($conn, $sqli);
            mysqli_stmt_bind_param($stmt, "s", $x);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_array($result)) {
                echo $row['status'] . '&nbsp;<img src="img/online.png" style="width:20px;">';
            }
            mysqli_stmt_close($stmt);
        }
        ?>
    </h3>
    </h2>
    <hr><br>
    <ul>
        <li><a href="one.php">&#x1F3E0; &nbsp;Dashboard</a></li>
        <li><a href="reservation.php">&#128197; &nbsp;New Reservation</a></li>
        <li><a href="allreservation.php" style="color:#fff;background:#e1700f;">&#128197; &nbsp;All Reservations</a></li>
        <li><a href="rooms.php">&#128719; &nbsp; Manage Rooms</a></li>
        <li><a href="help.php">&#x1F4AC; &nbsp;Help</a></li>
    </ul>
</div>
<div class="rgt">
    <div class="add">
        <h3>&#128197; &nbsp;/&nbsp; All Reservations</h3>
    </div>
    <br><br><br><br>
    <table width="99%" cellspacing="10">
        <tr class="t1">
            <td>Room No</td>
            <td>Room Type</td>
            <td>In</td>
            <td>Out</td>
            <td>Action</td>
        </tr>
        <?php
        $sel = "SELECT * FROM booking";
        $run = mysqli_query($conn, $sel);
        while ($row = mysqli_fetch_array($run)) {
            $id = $row['bookin_id'];
            ?>
            <tr class="t2">
                <td><?php echo $row['room_no']; ?></td>
                <td><?php echo $row['room_type']; ?></td>
                <td><?php echo $row['check_in']; ?></td>
                <td><?php echo $row['check_out']; ?></td>
                <td>
                    <a href="data.php?id=<?php echo $id; ?>" class="a1">&#x1F441;</a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="allreservation.php?delete=<?php echo $id; ?>" onclick="return confirm('Are you Sure?')" class="a2">&#128465;</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_stmt = mysqli_prepare($conn, "DELETE FROM booking WHERE bookin_id=?");
    mysqli_stmt_bind_param($delete_stmt, "i", $id);
    if (mysqli_stmt_execute($delete_stmt)) {
        header("Location: allreservation.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_stmt_close($delete_stmt);
}
mysqli_close($conn);
?>
</body>
</html>