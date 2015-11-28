<?php

   include 'connect.php';
   //TODO: redirect, user ID
   extract($_POST);
   $tid=uniqid();
   $sql="INSERT INTO `members`(`meber_id`, `names`, `gender`, `phone`, `national_id`, `designation`, `location`, `employee_no`, `company_id`, `date_applied`, `date_approved`, `application_status`, `transaction_id`) VALUES
                              (null,'$names','$gender','$phone','$idnumber','$designation','$location','$enumber','$company','$date',CURDATE(),'Approved','$tid')";
   $res = mysql_query($sql);
   if($res)
   {
      $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) VALUES 
                                      (null,'$tid','1',CURDATE(),'New User Approved')";
      mysql_query($sql2);
      echo "success";

   }else
   {
      echo "Failed";
   }
?>