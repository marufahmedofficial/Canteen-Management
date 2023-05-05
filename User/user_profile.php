<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'canteen_management_system';

$conn = mysqli_connect($servername, $username, $password, $database) or die('connection failed!');

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){  
  
  header('location: login.php');

}

if(isset($_GET['logout'])){

  unset($user_id);
  session_destroy();
  header('location: login.php');

}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Canteen Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <h1 class="text-center">User Profile</h1>

  <div class="container" style="width: 360px;">

    <?php

      $select = "SELECT * FROM `customers` WHERE `customer_id` = '$user_id'";

      $result = mysqli_query($conn, $select);

      $num = mysqli_num_rows($result);

      $fetch = mysqli_fetch_assoc($result);

    ?>

    <p>Name: <?php echo $fetch['customer_name'] ?></p>

    <p>Email: <?php echo $fetch['customer_email'] ?></p>

    <div class="container" style="width: 360px;">

      <form action="" method="">
        <input type="submit" class="btn btn-outline-dark" name="logout" value="logout">
      </form>

    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>