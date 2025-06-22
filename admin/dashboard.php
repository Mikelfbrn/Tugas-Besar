<?php
    session_start();
    include '../config.php';

    // Total Booked Room
    $roombooksql = "SELECT COUNT(*) as total FROM roombook";
    $roombookre = mysqli_query($conn, $roombooksql);
    $roombookrow = mysqli_fetch_assoc($roombookre)['total'];

    // Total Staff
    $staffsql = "SELECT COUNT(*) as total FROM staff";
    $staffre = mysqli_query($conn, $staffsql);
    $staffrow = mysqli_fetch_assoc($staffre)['total'];

    // Total Rooms
    $roomsql = "SELECT COUNT(*) as total FROM room";
    $roomre = mysqli_query($conn, $roomsql);
    $roomrow = mysqli_fetch_assoc($roomre)['total'];

    // Profit Calculation
    $profitSql = "SELECT SUM(finaltotal * 0.1) as totalProfit FROM payment";
    $profitRe = mysqli_query($conn, $profitSql);
    $tot = mysqli_fetch_assoc($profitRe)['totalProfit'];
    $tot = number_format($tot, 2); // Format profit to 2 decimal places
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dashboard.css">
    <title>BlueBird - Admin</title>
</head>
<body>
   <div class="databox">
        <div class="box roombookbox">
          <h2>Total Booked Room</h2>  
          <h1><?php echo $roombookrow ?> / <?php echo $roomrow ?></h1>
        </div>
        <div class="box guestbox">
          <h2>Total Staff</h2>  
          <h1><?php echo $staffrow ?></h1>
        </div>
        <div class="box profitbox">
          <h2>Profit</h2>  
          <h1><?php echo $tot ?> <span>Rp</span></h1>
        </div>
    </div>
</body>
</html>
