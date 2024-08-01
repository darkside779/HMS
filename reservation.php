<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'hotel');
if (!$conn) {
    die('Error in Connection');
}

if (isset($_POST['reserv'])) {
    $a = $_POST['typ'];
    $b = $_POST['no'];
    $c = $_POST['in'];
    $d = $_POST['out'];
    $e = $_POST['price'];
    $f = $_POST['fname'];
    $g = $_POST['phone'];
    $h = $_POST['address'];
    $i = $_POST['card'];
    $j = $_POST['nit'];
    
    $chk = "SELECT * FROM booking WHERE cust_name= '$f' AND room_no='$b'";
    $run_chk = mysqli_query($conn, $chk);
    if (mysqli_num_rows($run_chk) > 0) {
        echo '<script>alert("There Is A Reservation With The Same Room Data ");</script>';
    } else {
        $ins = "INSERT INTO booking (cust_name, cust_phone, cust_address, cust_nic, room_no, room_type, check_in, check_out, price, nit)
                VALUES ('$f', '$g', '$h', '$i', '$b', '$a', '$c', '$d', '$e', '$j')";
        $run = mysqli_query($conn, $ins);
        if ($run) {
            echo '<script>alert("Booking Succeeded");</script>';
        } else {
            echo "Cannot Booking Now: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Reservation</title>
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
    <style>
        .form-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }
        .form-group > div {
            flex: 1 1 48%;
            min-width: 200px;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            box-sizing: border-box;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #e1700f;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        @media (max-width: 768px) {
            .form-group > div {
                flex: 1 1 100%;
            }
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
        <h2><img src="img/htl.png" alt="Hotel Icon"></h2>
        <h3 style="color:#888888;">
            <?php
            if (isset($_SESSION['recept'])) {
                $x = $_SESSION['recept'];
                $sqli = "SELECT * FROM recept WHERE name='$x'";
                $result = mysqli_query($conn, $sqli);
                while ($row = mysqli_fetch_array($result)) {
                    echo $row['status'] . '&nbsp;<img src="img/online.png" style="width:20px;" alt="Online Status">';
                }
            }
            ?>
        </h3>
        <hr><br>
        <ul>
            <li><a href="one.php">&#x1F3E0; &nbsp;Dashboard</a></li>
            <li><a href="reservation.php "  class="active" style="color:#fff;background:#e1700f;">&#128197; &nbsp;New Reservation</a></li>
            <li><a href="allreservation.php">&#128197; &nbsp;All Reservations</a></li>
            <li><a href="rooms.php">&#128719; &nbsp;Manage Rooms</a></li>
            <li><a href="help.php">&#x1F4AC; &nbsp;Help</a></li>
        </ul>
    </div>
    <div class="rgt">
        <div class="add">
            <h3>&#128197; &nbsp;/ &nbsp; New Reservation</h3>
        </div>
        <br><br>
        <div class="res">
            <form action="" method="POST">
                <div class="form-group">
                    <div>
                        <label>Select Room Type</label>
                        <select name="typ" class="in" required>
                            <?php
                            $c = "SELECT * FROM rooms_type";
                            $runc = mysqli_query($conn, $c);
                            while ($row = mysqli_fetch_array($runc)) {
                                echo '<option value="' . $row['type'] . '">' . $row['type'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label>Select Room No</label>
                        <select name="no" class="in" required>
                            <?php
                            $c = "SELECT * FROM rooms";
                            $runc = mysqli_query($conn, $c);
                            while ($row = mysqli_fetch_array($runc)) {
                                echo '<option value="' . $row['room_no'] . '">' . $row['room_no'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label>Check-in Date</label>
                        <input type="date" name="in" class="in" required>
                    </div>
                    <div>
                        <label>Check-out Date</label>
                        <input type="date" name="out" class="in" required>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label>Price</label>
                        <input type="number" name="price" class="in" required>
                    </div>
                    <div>
                        <label>Customer Name</label>
                        <input type="text" name="fname" class="in" required>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="in" required>
                    </div>
                    <div>
                        <label>Address</label>
                        <input type="text" name="address" class="in" required>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label>Card Number</label>
                        <input type="text" name="card" class="in" required>
                    </div>
                    <div>
                        <label>NIC Number</label>
                        <input type="text" name="nit" class="in" required>
                    </div>
                </div>
                <input type="submit" name="reserv" value="Make Reservation" class="btn">
            </form>
        </div>
    </div>
</body>
</html>