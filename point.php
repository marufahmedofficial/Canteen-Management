<?php
include("connection/connect.php");  
error_reporting(0);  
session_start(); 

?>
<html>
    <body>
        Buy points <br>
        current points: <?php $user_id = $_SESSION['user_id'];
                                $result= mysqli_query($db,"select point from users where u_id='$user_id'");
                                if (mysqli_num_rows($result) > 0){
                                     while($row = mysqli_fetch_assoc($result)) {
                                        $point = $row['point'];
                                        echo $point;
                                        $_SESSION["point"] = $point; 
                                     }
                                }
                                ?>
                                <br>
                                <?php
                                if(array_key_exists('tenpoints', $_POST)) {
                                    tenpoints();
                                    header ("Location: index.php");
                                }
                                else if(array_key_exists('twentypoint', $_POST)) {
                                    twentypoint();
                                    header ("Location: index.php");
                                }
                                function tenpoints() {
                                    $userid = $_SESSION['user_id'];
                                    $current_point = $_SESSION['point'];
                                    $dbservername = "localhost";
                                    $dbusername = "root";
                                    $dbpassword = "";
                                    $dbname = "uits_online_canteen";
                                    $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
                                    $sql = "UPDATE users SET point=$current_point+10 WHERE u_id=$userid";
                                    if (mysqli_query($conn, $sql)) {
                                        }
                                    }

                                    function twentypoint() {
                                        $userid = $_SESSION['user_id'];
                                        $current_point = $_SESSION['point'];
                                        $dbservername = "localhost";
                                        $dbusername = "root";
                                        $dbpassword = "";
                                        $dbname = "uits_online_canteen";
                                        $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
                                        $sql = "UPDATE users SET point=$current_point+20 WHERE u_id=$userid";
                                        if (mysqli_query($conn, $sql)) {
                                            }
                                        }
?>
        
        <form method="post">
        10 points: <input type="submit" name="tenpoints"
                class="button" value="tenpoints" />
                
                20 points: <input type="submit" name="twentypoint"
                class="button" value="twentypoint" />
          
    </form>
    </body>
</html>