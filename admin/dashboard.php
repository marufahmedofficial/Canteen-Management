<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(empty($_SESSION["adm_id"]))
{
	header('location:index.php');
}
else
{
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    
    <div id="main-wrapper">
     
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">

            <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                        
                        <span><img class="img-rounded" src="images/Canteen2.png" alt="" height="60px" width="65px"></span>
                    </a>
                </div>

                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                    </ul>
                    
                       
                      
                      
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
      
        <div class="left-sidebar">
   
            <div class="scroll-sidebar">
       
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-label">Log</li>
                        <li> <a href="all_users.php">  <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Category</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="add_category.php">Add Category</a></li>
                            </ul>
                        </li>
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">All Menues</a></li>
								<li><a href="add_menu.php">Add Menu</a></li>
                                <li><a href="add_dishes.php">Add Dish</a></li>
                            </ul>
                        </li>
						 <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>


                         <li> <a href="add_points.php"><i class="fa fa-plus" aria-hidden="true"></i><span>Point</span></a></li>

                         
                    </ul>
                </nav>
            
            </div>
           
        </div>


    
        <div class="page-wrapper">
         
        
        
            <div class="container-fluid">
            <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Admin Dashboard</h4>
                            </div>




                                <!--date picker-->
                                <form action="#" method="post">
                                <input type="date" name="date_picker"/>
                                <?php
                                    $Date = $_POST["date_picker"];
                                    
                                    echo "<p>$Date</p>";
                                    
                                ?>
                                <input type="submit" name="submit" value="Submit" style="cursor: pointer;">
                                </form>
                                <!--date picker-->

                                
                                


                     <div class="row">
                   
                    
					
					 <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-cutlery f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from dishes";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Dishes</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-users f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from users";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-shopping-cart f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php 
                                    if($Date==''){
                                        $result = mysqli_query($db, 'SELECT * FROM users_orders');
                                    }else{
                                        $result = mysqli_query($db, 'SELECT * FROM users_orders WHERE date = "'.$Date.'"');
                                    }
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                                    <?php
                                                    if($Date==''){
                                                    ?>
                                                    <p class="m-b-0">Total Orders</p>
                                                    <?php
                                                        }else{
                                                    ?>
                                                    <p class="m-b-0" style="font-size: 14px;">Total Orders of <?php echo $Date?></p>
                                                    <?php
                                                        }
                                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>	                   
                </div>     
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-th-large f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from res_category";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Categories</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-spinner f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php 
                                    if($Date==''){
                                        $result = mysqli_query($db, 'SELECT * FROM users_orders WHERE status = "in process"');
                                    }else{
                                        $result = mysqli_query($db, 'SELECT * FROM users_orders WHERE status = "in process" AND date = "'.$Date.'"');
                                    }
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                                    <?php
                                                    if($Date==''){
                                                    ?>
                                                    <p class="m-b-0">Processing Orders</p>
                                                    <?php
                                                        }else{
                                                    ?>
                                                    <p class="m-b-0" style="font-size: 14px;">Processing Orders of <?php echo $Date?></p>
                                                    <?php
                                                        }
                                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-check f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php 
                                    if($Date==''){
                                        $result = mysqli_query($db, 'SELECT * FROM users_orders WHERE status = "closed"');
                                    }else{
                                        $result = mysqli_query($db, 'SELECT * FROM users_orders WHERE status = "closed" AND date = "'.$Date.'"');
                                    }
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                            <?php
                                            if($Date==''){
                                            ?>
                                            <p class="m-b-0">Delivered Orders</p>
                                            <?php
                                                }else{
                                            ?>
                                            <p class="m-b-0" style="font-size: 14px;">Delivered Orders of <?php echo $Date?></p>
                                            <?php
                                                }
                                            ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-times f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php 
                                    if($Date==''){
                                        $result = mysqli_query($db, 'SELECT * FROM users_orders WHERE status = "rejected"');
                                    }else{
                                        $result = mysqli_query($db, 'SELECT * FROM users_orders WHERE status = "rejected" AND date = "'.$Date.'"');
                                    }
                                            $rws=mysqli_num_rows($result);
                                            
                                            echo $rws;?></h2>
                                            <?php
                                            if($Date==''){
                                            ?>
                                            <p class="m-b-0">Cancelled Orders</p>
                                            <?php
                                                }else{
                                            ?>
                                            <p class="m-b-0" style="font-size: 14px;">Cancelled Orders of <?php echo $Date?></p>
                                            <?php
                                                }
                                            ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-money f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php 
                                    //---> from here
                                    $total = 0;

                                    if($Date==''){
                                        $result = mysqli_query($db, 'SELECT * FROM users_orders WHERE status = "closed"');

                                        if (mysqli_num_rows($result) > 0){
                                            $sum = 0;
                                            while($row = mysqli_fetch_array($result)) {
                                                $Quantity = $row['quantity'];
                                                $Price = $row['price'];
                                                $sum += ($Quantity*$Price);
                                            }
                                            $total = $sum;
                                        }
                                        //$result = mysqli_query($db, 'SELECT SUM(price) AS value_sum FROM users_orders WHERE status = "closed"');
                                    }else{
                                        $result = mysqli_query($db, 'SELECT * FROM users_orders WHERE status = "closed" AND date = "'.$Date.'"');

                                        if (mysqli_num_rows($result) > 0){
                                            $sum = 0;
                                            while($row = mysqli_fetch_array($result)) {
                                                $Quantity = $row['quantity'];
                                                $Price = $row['price'];
                                                $sum += ($Quantity*$Price);
                                            }
                                            $total = $sum;
                                        }
                                        //$result = mysqli_query($db, 'SELECT SUM(price) AS value_sum FROM users_orders WHERE status = "closed" AND date = "'.$Date.'"');
                                    }
                                         
                                        //$row = mysqli_fetch_assoc($result); 
                                        //$sum = $row['value_sum'];
                                        //echo $sum;
                                        echo $total;
                                        ?></h2>
                                        <?php
                                            if($Date==''){
                                        ?>
                                        <p class="m-b-0">Total Earnings</p>
                                        <?php
                                            }else{
                                        ?>
                                        <p class="m-b-0" style="font-size: 14px;">Total Earnings of <?php echo $Date?></p>
                                        <?php
                                            }
                                            //---> to here...
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>
   
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>
<?php
}
?>