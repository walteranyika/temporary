<?php
  include 'connect.php';
  extract($_POST);
  $tid=uniqid();
 // $sql="INSERT INTO `companies`(`company_id`, `category`, `name`, `address`, `date_added`,`tid`) 
   //                      VALUES (null,'$category','$name','$address',CURDATE(),'$tid')";
  $sql="UPDATE `companies` SET `category`='$category',`name`='$name',`address`='$address',`tid`='$tid'
        WHERE `company_id`='$company_id'";
  $res=mysql_query($sql);
  if($res)
  {
  	 $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) VALUES
  	                                  (null,'$tid','1',CURDATE(),'Updated This Company')";
      mysql_query($sql2);
    echo "success";
  }
  else
  {
    echo "Failed";
  }

?>