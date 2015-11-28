<?php
   include 'connect.php';
   session_start();
   $user_id= $_SESSION['user_id'];
   extract($_POST);
   $tid=uniqid();
   $password=md5("password"."!@#$%^&*()_+_)qwertyupokjhbvcvbn(*&^%$#@");
   $sql="INSERT INTO `users`(`user_id`, `names`, `email`, `password`, `type`, `reg_date`,`tid`) 
         VALUES (null,'$names','$email','$password','$user_type',CURDATE(),'$tid')";
   $res=mysql_query($sql);
   if($res)
   {
      $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) 
                                                   VALUES 
                                      (null,'$tid','$user_id',CURDATE(),'Added New User')";
      mysql_query($sql2);
      echo "Success";
   }
   else
   {
      echo "Failed To Add User $names. The user might be already in your database";
   }


?>