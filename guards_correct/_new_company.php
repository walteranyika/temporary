<?php
  include 'connect.php';
  extract($_POST);
  $tid=uniqid();
  $sql="INSERT INTO `companies`(`company_id`, `category`, `name`, `address`, `date_added`,`tid`) 
                         VALUES (null,'$category','$name','$address',CURDATE(),'$tid')";
  $res=mysql_query($sql);
  if($res)
  {
  	 $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) VALUES
  	                                  (null,'$tid','1',CURDATE(),'New Company Added')";
      mysql_query($sql2);
    echo "success";
  }
  else
  {
    echo "Failed";
  }

?>