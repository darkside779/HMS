<?php
session_start();

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'hotel');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set default theme if not already set
if (!isset($_SESSION['theme'])) {
    $_SESSION['theme'] = 'dark-mode.css'; // Default theme
}

// Toggle theme if requested
if (isset($_GET['theme'])) {
    $_SESSION['theme'] = $_GET['theme'];
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link id="theme-style" rel="stylesheet" href="css/<?php echo htmlspecialchars($_SESSION['theme']); ?>">
    <link rel="icon" href="img/htl.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .theme-toggle-btn {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1000;
            background-color: #fff;
            border: 2px solid #e1700f;
            border-radius: 50%;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.4s;
            width: 40px;
            height: 40px;
        }

        .theme-toggle-btn:hover {
            background-color: #e1700f;
            color: #fff;
            border-color: #fff;
        }

        .theme-toggle-btn i {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <button class="theme-toggle-btn" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </button>
    <script>
        function toggleTheme() {
            const currentTheme = document.getElementById('theme-style').getAttribute('href');
            const newTheme = currentTheme.includes('light-mode.css') ? 'dark-mode.css' : 'light-mode.css';
            const url = new URL(window.location.href);
            url.searchParams.set('theme', newTheme);
            window.location.href = url.toString();
        }
    </script>
    <div class="top">
        <h2><span style="font-size:34px;">&#x210B;</span> Management </h2>
    </div>
    <div class="lft">
        <h2><img src="img/htl.png" alt="Hotel Icon"></h2>
        <h3 style="color:#888888;">
            <?php
            if (isset($_SESSION['recept'])) {
                $x = $_SESSION['recept'];
                $sqli = "SELECT * FROM recept WHERE name='$x'";
                $result = mysqli_query($conn, $sqli);
                while ($row = mysqli_fetch_array($result)) {
                    echo htmlspecialchars($row['status']); ?>&nbsp;
                    <img src="img/online.png" style="width:20px;" alt="Online Status">
                    <?php
                }
            } else {
                echo "Receptionist status unavailable.";
            }
            ?>
        </h3>
        <hr><br>
        <ul>
            <li><a href="one.php" style="color:#fff;background:#e1700f;">&#x1F3E0; &nbsp;Dashboard</a></li>
            <li><a href="reservation.php">&#128197; &nbsp;New Reservation</a></li>
            <li><a href="allreservation.php">&#128197; &nbsp;All Reservations</a></li>
            <li><a href="rooms.php">&#128719; &nbsp;Manage Rooms</a></li>
            <li><a href="help.php">&#x1F4AC; &nbsp;Help</a></li>
        </ul>
    </div>
    <div class="rgt">
        <div class="up">
            <h3>&#x1F3E0; &nbsp; / &nbsp; Dashboard</h3>
        </div>
        <div class="box">
            <div class="card">
                <h2>&#128719;<br>Rooms</h2><br><br><br>
                <?php
                $query = "SELECT id FROM rooms";
                $st = mysqli_prepare($conn, $query);
                if ($st) {
                    mysqli_stmt_execute($st);
                    mysqli_stmt_bind_result($st, $id);
                    mysqli_stmt_store_result($st);
                    $cunt = mysqli_stmt_num_rows($st);
                } else {
                    $cunt = "Error preparing statement";
                }
                ?>
                <hr><h3><?php echo $cunt; ?>&nbsp; Room</h3><hr>
            </div>
            <div class="card">
                <h2>&#128197;<br>Books</h2><br><br><br>
                <?php
                $query = "SELECT bookin_id FROM booking";
                $st = mysqli_prepare($conn, $query);
                if ($st) {
                    mysqli_stmt_execute($st);
                    mysqli_stmt_bind_result($st, $bookin_id);
                    mysqli_stmt_store_result($st);
                    $cunt = mysqli_stmt_num_rows($st);
                } else {
                    $cunt = "Error preparing statement";
                }
                ?>
                <hr><h3><?php echo $cunt; ?>&nbsp; Bookings</h3><hr>
            </div>
            <div class="card">
                <h2>&#128719;<br>Salary (Outcomes)</h2><br><br><br>
                <?php
                $sal = "SELECT SUM(salary) FROM staff";
                $runsal = mysqli_query($conn, $sal);
                while ($row = mysqli_fetch_array($runsal)) {
                    ?>
                    <hr><h3><?php echo $row['SUM(salary)']; ?>&nbsp; SDG</h3><hr>
                    <?php
                }
                ?>
            </div>
            <div class="card">
                <h2>&#128719;<br>Total Income</h2><br><br><br>
                <?php
                $sal = "SELECT SUM(price) FROM booking";
                $runsal = mysqli_query($conn, $sal);
                while ($row = mysqli_fetch_array($runsal)) {
                    $pp = $row['SUM(price)'];
                    ?>
                    <hr><h3><?php echo $pp; ?>&nbsp; SDG</h3><hr>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>