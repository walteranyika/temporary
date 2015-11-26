<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
      <title>Welcome to Union MIS</title>
      <script src="js/jquery.min.js"></script>
      <!--<script src="jquery-1.11.0.js"></script>-->
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
      <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
      <link rel="stylesheet" type="text/css" href="css/home.css" />
      <!-- Start WOWSlider.com HEAD section -->
      <link rel="stylesheet" type="text/css" href="engine1/style.css" />
      <script type="text/javascript" src="engine1/jquery.js"></script>
      <!-- End WOWSlider.com HEAD section -->
</head>

<body style="background-color:#00838f">
    
    <div class="logout_btn">
        <a href="index.php" class="btn btn-primary btn-large">Logout <i class="icon-white icon-check"></i></a>
    </div>    
    <div class="img_home_pos" >
        <a style="color:#212121; text-decoration:none" href="everyone.php"><img src="images/logo.png" height="90"alt=UMS/><span class="header_pos">Kenya National Private Security Workers Union</span>
    </div><br>                        
    <div class="dropdownmenu_container">
         <?php  include 'admin_menu.php'; ?>			     
    </div>		
 <div class="container_middle">		
        <div class="panel panel-default">
            <!-- Default panel contents -->
           <div class="panel-heading">All Members</div>
            <!-- Table -->
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Member's Name</th>
                            <th style="text-align: center;">Gender</th>
                            <th style="text-align: center;">Date Joined</th>
                            <th style="text-align: center;">National ID</th>
                            <th style="text-align: center;">Employee Number</th>
                            <th style="text-align: center;">Mobile No</th>
                            <th style="text-align: center;">Designation</th>
                            <th style="text-align: center;">Location</th>
                            <th style="text-align: center;" colspan="2">Operation</th>
                        </tr>                        
                    </thead>
                      <?php
                         include 'connect.php';
                         $sql="select * from members";
                         $results=mysql_query($sql);
                         $num=1;
                         while ($row=mysql_fetch_row($results)) 
                         {
                            $id=$row[0]; $names=$row[1]; $gender=$row[2]; $date=$row[9];  $nid=$row[4];
                            $enumber=$row[7]; $mobile=$row[3]; $designation=$row[5]; $location=$row[6];   

                            echo "<tr>
                                        <td>$id</td>
                                        <td>$names</td>
                                        <td>$gender</td>
                                        <td>$date</td>
                                        <td>$nid</td>
                                        <td>$enumber</td>
                                        <td>$mobile</td>
                                        <td>$designation</td>
                                        <td>$location</td>
                                        <td><a href='edit.php?id=$id'>Edit</a></td>
                                        <td><a href='delete.php?id=$id'>Edit</a></td>
                                  </tr>";
                             $num++;
                         }
                      ?>
            </table>

        </div>
 </div> <!--End of Middle Container-->
</body>
</html>