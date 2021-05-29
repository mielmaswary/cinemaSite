<?php

    $connection=mysqli_connect('localhost','root','');
    if(mysqli_connect_errno())
    {
        echo "error!".mysqli_connect_error();
        echo "</br>";

    }

    $sql='CREATE DATABASE cinema';
    if(mysqli_query($connection,$sql))
    {
        echo "Database created. </br>";
        echo "</br>";

    }
    else
    {
        echo "Error ".mysqli_error($connection);
        echo "</br>";
    }

    $sql='USE cinema';
     if(mysqli_query($connection,$sql))
     {
         echo "Using cinema. </br>";
         echo "</br>";
 
     }
     else
     {
         echo "Error ".mysqli_error($connection);
         echo "</br>";
     }

    $sql='CREATE TABLE halls(number INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, movieName VARCHAR(50), ticketsAvailable INT)';
    if(mysqli_query($connection,$sql))
    {
        echo "Table created.";
        echo "</br>";

    }
    else
    {
        echo "Error ".mysqli_error($connection);
        echo "</br>";

    }
     
     for ($i=0; $i < 5; $i++) { 
         $sql='INSERT INTO halls() VALUES()';
         if(mysqli_query($connection,$sql))
         {
             echo "hall ".$i."created. </br>";
             echo "</br>";
     
         }
         else
         {
             echo "Error ".mysqli_error($connection);
             echo "</br>";
     
         }
     }


    $sql="GRANT ALL ON cinema.* TO 'cinema-admin'@'localhost' IDENTIFIED BY '12345'";
    if(mysqli_query($connection,$sql))
    {
        echo "User created. </br>";
        echo "</br>";

    }
    else
    {
        echo "Error ".mysqli_error($connection);
        echo "</br>";

    }
    mysqli_close($connection);
?>
