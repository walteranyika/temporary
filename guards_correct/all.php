<?php
  include 'protect.php';
?>
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
      <script src="dist/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

      <script type="text/javascript">
            $(function() 
            {
              $('.btn_del').on('click', function()
              {
                    var button = $(this);
                    var parentTd = button.parent('td');
                    var parentTr = parentTd.parent('tr');
                    var id = parentTr.attr('id');
                    //alert(id);
                    show_alert(id) 

              }); 
            });

            function show_alert(id)
            {

              swal({
                      title: "Are you sure?",
                      text: "You will not be able to recover this Record After Deletion!",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Yes, Delete",
                      cancelButtonText: "No, Cancel",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    },
                    function(isConfirm)
                    {
                      if (isConfirm) 
                      {
                        swal("Deleted!", "This record has been deleted From The Database.", "success");
                        delete_row(id);
                      } 
                      else 
                      {
                          swal("Cancelled", "Your Record Is Safe:)", "error");
                      }
                    });
            }

            function delete_row(idval)
            {
                $.post("delete.php",
                      {member_id: idval },
                      function(data,status)
                      {
                        console.log(data);
                       swal("Deleted!", data, "success");
                      }
                     );
         
            }
      </script>
</head>

<body style="background-color:#00838f">
    
    <div class="logout_btn">
        <a href="logout.php" class="btn btn-primary btn-large">Logout <i class="icon-white icon-check"></i></a>
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

                            echo "<tr id='$id'>
                                        <td>$id</td>
                                        <td>$names</td>
                                        <td>$gender</td>
                                        <td>$date</td>
                                        <td>$nid</td>
                                        <td>$enumber</td>
                                        <td>$mobile</td>
                                        <td>$designation</td>
                                        <td>$location</td>
                                        <td><a href='edit_member.php?member_id=$id'>Edit</a></td>
                                        <td><button class='btn_del'>Delete</button></td>
                                  </tr>";
                             $num++;
                         }
                      ?>
            </table>

        </div>
 </div> <!--End of Middle Container-->
</body>
</html>