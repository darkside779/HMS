<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'hotel');
if (!$conn) {
    echo 'Error in Connection';
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = mysqli_prepare($conn, "SELECT * FROM rooms WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $room = mysqli_fetch_array($result);
    mysqli_stmt_close($stmt);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $room_no = $_POST['room_no'];
    $room_type = $_POST['room_type'];

    $stmt = mysqli_prepare($conn, "UPDATE rooms SET room_no=?, room_type=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssi", $room_no, $room_type, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: rooms.php");
        exit();
    } else {
        echo "Error updating room: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
<html>
<head>
    <title>Edit Room</title>
    <link id="theme-style" rel="stylesheet" href="css/dark-mode.css">
</head>
<body>
<div class="top">
    <h2><span style="font-size:34px;">&#x210B;</span> Edit Room</h2>
</div>
<form method="post" action="editroom.php">
    <input type="hidden" name="id" value="<?php echo $room['id']; ?>">
    <label for="room_no">Room No:</label>
    <input type="text" name="room_no" id="room_no" value="<?php echo $room['room_no']; ?>" required>
    <label for="room_type">Room Type:</label>
    <input type="text" name="room_type" id="room_type" value="<?php echo $room['room_type']; ?>" required>
    <button type="submit">Update Room</button>
</form>
</body>
</html>