<?php
   include 'connect.php';
   extract($_POST);
   //{c_id:contribution_id,tarehe:date,amt:amount}
   $tid=uniqid();
   $sql="UPDATE `contributions` SET `date_contributed`='$tarehe',`contribution_amt`='$amt',`transaction_id`='$tid' 
         WHERE `contribution_id`='$c_id'";
   $res =mysql_query($sql);
   if($res)
   {
   	   $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) 
                                        VALUES  (null,'$tid','1',CURDATE(),'Edited Contributions')";
      mysql_query($sql2);
      echo "Success";
   }else
   {
      echo "Failed";
   }

?>