<?php
     include 'connect.php';
     extract($_POST);
     $tid=uniqid();
     $sql="INSERT INTO `contributions`(`contribution_id`, `member_id`, `date_contributed`, `contribution_amt`, `transaction_id`) 
                                VALUES (null,'$mid','$tarehe','$amt','$tid')";
     $res=mysql_query($sql);
     if($res)
     {
      $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) 
                                        VALUES  (null,'$tid','1',CURDATE(),'Added New Contribution')";
      mysql_query($sql2);
      echo "Success";
     }else
     {
      echo "Failed";
     }

?>