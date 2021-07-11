<?php
     $connection=mysqli_connect('localhost','cinema-admin','12345');
     if(mysqli_connect_errno())
     {
         echo "error!".mysqli_connect_error();
     }
     $sql='USE cinema';
     if(mysqli_query($connection,$sql))
     {
        //  echo "Using cinema. </br>";
     }
     else
     {
         echo "Error ".mysqli_error($connection);
     }
?>