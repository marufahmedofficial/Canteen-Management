<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'canteen_management_system';

$conn = mysqli_connect($servername, $username, $password, $database) or die('connection failed!');

session_start();

$user_id = $_SESSION['user_id'];
/*
$query4 = "SELECT sum(item_price) FROM orders WHERE customer_id ='$user_id'";
$runQuery4 = mysqli_query($conn, $query4);
while($row = mysqli_fetch_assoc($runQuery4)){
	$sum = $row['sum(item_price)'];
}
*/

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Food List - Canteen Management System</title>
</head>

<body>

  <!--Navbar starts here-->
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="navbar">
      <div class="container-fluid">
        <a class="navbar-brand" href="#navbar"><b>LOGO</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="home.html" target="_new">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html" target="_new">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html" target="_new">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="items.php" target="_new">Food List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php" target="_new">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php" target="_new">Signup</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!--Navbar ends here-->

  <!--List starts here-->
  <div class="container" style="width: 500px; margin-top: 100px; padding: 10px; border: 1px solid gray; border-radius: 10px;">

    <?php

      //user infos
      $select = "SELECT * FROM `customers` WHERE `customer_id` = '$user_id'";

      $result = mysqli_query($conn, $select);

      $fetch = mysqli_fetch_assoc($result);

    ?>

    <!--Fatch items from database and display them in this table-->
    <table cellpadding="20" cellspacing="20" text-align="center">

      <tr style="margin-left: 2em;">
        <th>No.</th>
        <th>Name</th>
        <th>Price</th>
        <th>Location</th>
        <th>Add to cart</th>
      </tr>

      <?php

				$i = 0;

				$query = "SELECT * FROM products";

				$runQuery = mysqli_query($conn, $query);

				while($row = mysqli_fetch_assoc($runQuery)){
          $itemId = $row['item_id'];
					$itemName = $row['item_title'];
					$itemPrice = $row['item_price'];
					$i++;

				echo '
					<tr style="margin-left: 2em;" >
						<td>'.$i.'</td>
						<td>'.$itemName.'</td>
						<td>'.$itemPrice.'</td>
            <td><input type="text" class="form-control" name="location"></td>
						<td align="center"><a href="items.php?item_id='.$itemId.'"><button type="button" name="call" class="btn btn-primary">Add</button></a></td>
					</tr>
					';
				}

			?>

    </table>

    <?php

      //Insert orders in the database
			if(isset($_GET['item_id'])){

				$id = $_GET['item_id'];

				$query = "SELECT * FROM products WHERE item_id =" .$id;

				$runQuery = mysqli_query($conn, $query);

				while($row = mysqli_fetch_assoc($runQuery)){
					$itemName = $row['item_title'];
					$itemPrice = $row['item_price'];
					$query1 = "INSERT INTO orders (order_id, item_id, item_title, item_price, customer_id) VALUES (NUll, '$id', '$itemName', '$itemPrice', '$user_id')";
					$runQuery1 = mysqli_query($conn, $query1);
				}
			}

      /*
			if(isset($_GET['call'])){
				$query3="SELECT sum(item_price) FROM orders WHERE customer_id='$user_id'";
				$runQuery3=mysqli_query($conn,$query);
				while($row=mysqli_fetch_assoc($runQuery3)){
					$sum=$row['sum(item_price)'];
          header("location: full_menu.php");
				}
			}
      */

		?>
                          
    <center><span><p>Current Cart amount : <?php 
                                
    //if($sum!=0) {echo $sum;}

    ?></p></span>
    
    <!--Logout part starts here-->
    <div class="container" style="width: 360px;">

      <form action="" method="">
        <input type="submit" class="btn btn-outline-dark" name="logout" value="logout">
      </form>

    </div></center>
    <!--Logout part ends here-->

  </div>
  <!--List ends here-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>