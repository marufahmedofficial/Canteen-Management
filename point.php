<?php
include("connection/connect.php");  
error_reporting(0);  
session_start(); 

if(isset($_POST['confirm'])) {
    $Amount = $_POST["amount"];
    $user_id = $_SESSION['user_id'];
                        $result= mysqli_query($db,"select point from users where u_id='$user_id'");
                        if (mysqli_num_rows($result) > 0){
                             while($row = mysqli_fetch_assoc($result)) {
                                $current_point = $row['point'];
                                echo $current_point;
                                echo $Amount;     
                                echo $sum = $current_point+$Amount;
 
                            $sql = "UPDATE users SET point=$sum WHERE u_id='$user_id'";

                            if (mysqli_query($db,$sql) === TRUE) {
                            echo "Record updated successfully";
                            } else {
                            echo "Error updating record: " . $db->error;
                            }

                            header ("Location: index.php");
                            }
                        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Points</title>
    <style>
        body {
            background-color: grey;
        }

        .main {
            background-color: #ed216d;
            width: 30%;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="container main">
        <div class="row" style="background-color: white;">
            <img src="images/bkash.png" alt="bkash payment">
        </div>

        <form action="#" method="post">
            <div class="row g-3 align-items-center"
                style="margin-top: 5px; margin-bottom: 5px; background-color: white; padding: 10px; text-align: center;">
                <div class="col">
                    <label for="inputAmount" class="col-form-label">Enter Amount: </label>
                </div>
                <div class="col">
                    <input type="number" name="amount" id="inputAmount" class="form-control" value="0" min="0" required>
                </div>
            </div>

            <p style="text-align: center; color: white; margin: 100px 25px 100px 25px;">
                Do your payment by bkash
                <br>
                By clicking on Confirm, you are agreeing to the terms & conditions
            </p>

            <div class="row" style="text-align: center; margin-bottom: 10px;">
                <div class="col-6">
                    <a href="index.php">
                        <button type="button" name="close" class="btn btn-secondary">CLOSE</button>
                    </a>
                </div>
                <div class="col-6">
                    <button type="submit" name="confirm" class="btn btn-secondary">CONFIRM</button>
                </div>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>
</body>

</html>