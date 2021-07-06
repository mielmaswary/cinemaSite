<?php
     $connection=mysqli_connect('us-cdbr-east-04.cleardb.com','cinema-admin','12345');
     if(mysqli_connect_errno())
     {
         echo "error!".mysqli_connect_error();
         echo "</br>";
     }
     $sql='USE cinema';
     if(mysqli_query($connection,$sql))
     {
        //  echo "Using cinema. </br>";
         echo "</br>";
     }
     else
     {
         echo "Error ".mysqli_error($connection);
         echo "</br>";
     }
?>