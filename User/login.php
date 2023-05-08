<?php

session_start();

if(isset($_POST['submit'])){
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'canteen_management_system';

  $conn = mysqli_connect($servername, $username, $password, $database) or die('connection failed!');
    
  $Email = $_POST['email'];
  $Password = $_POST['password'];

  $select = "SELECT * FROM `customers` WHERE `customer_email` = '$Email' AND `customer_password` = '$Password'";

  $result = mysqli_query($conn, $select);

  $num = mysqli_num_rows($result);

  if($num > 0){

    $fetch = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $fetch['customer_id'];
    header('location: items.php');

  }
  else{

    $alert[] = 'Incorrect password or email!';

  }

  $conn->close();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Login - Canteen Management System</title>
</head>

<body>

    <!--Navbar starts here-->
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#navbar"><b>LOGO</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link" href="items.php" target="_new">Food List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="login.php" target="_new">Login</a>
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

    <!--Login part starts here-->
    <div class="container" style="width: 360px; margin-top: 100px; border: 1px solid gray; border-radius: 10px;">
        <h1 class="text-center">Login Now</h1> <!--Heading-->

        <?php

            //Alart
            if(isset($alert)){

                foreach($alert as $alert){

                    echo '<span>'.$alert.'</span>';

                };
            
            };

        ?>

        <form action="" method="post"> <!--Form-->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-grid gap-2 d-md-block">
                <input type="submit" class="btn btn-outline-dark" name="submit" value="login">
            </div>
        </form>
        <p>
            Don't have any account <a href="signup.php">Signup</a>
        </p>
    </div>
    <!--Login part ends here-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>