<?php

    $connection=mysqli_connect('localhost','root','');
    if(mysqli_connect_errno())
    {
        echo "error!".mysqli_connect_error();

    }

    $sql='CREATE DATABASE cinema';
    if(mysqli_query($connection,$sql))
    {
        echo "Database created. </br>";

    }
    else
    {
        echo "Error ".mysqli_error($connection);
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

    $sql='CREATE TABLE halls(
         cinemaName VARCHAR (50),
         hallNumber INT (4),
         movieName VARCHAR(50),
         movieDateTime DATETIME,
         ticketsAvailable INT )';
    if(mysqli_query($connection,$sql))
    {
        echo "Table halls created.";
    }
    else
    {
        echo "Error ".mysqli_error($connection);
    }
    $cinemaNames=[
        'glilot',
        'kfr-saba',
        'rashlats',
        'jerusalem',
        'beer-sheva'
     ];
    for ($i=0; $i<5; $i++) { 
        global $cinemaNames;
        for($j=1;$j<6;$j++){
            $sql="INSERT INTO halls(cinemaName,hallNumber) VALUES('$cinemaNames[$i]',$j)";
            if(mysqli_query($connection,$sql))
            {
                echo "hall ".$cinemaNames[$i].'-'.$j." created. ";
        
            }
            else
            {
                echo "Error ".mysqli_error($connection);
    
            }
        }
      
     }

     $sql='CREATE TABLE purshasedTickets(
          id INT PRIMARY KEY AUTO_INCREMENT, 
          hallNumber INT,
          movieName VARCHAR(50),
          awnerName VARCHAR(15),
          awnerLastName VARCHAR(25),
          awnerEmail VARCHAR(15),
          awnerTicketsQuantity INT)';
     if(mysqli_query($connection,$sql))
     {
         echo "Table purshasedTickets created.";
         echo "</br>";
     }
     else
     {
         echo "Error ".mysqli_error($connection);
 
     }


     $sql='CREATE TABLE movies(
        id INT PRIMARY KEY AUTO_INCREMENT, 
        movieName VARCHAR(50),
        movieDescription VARCHAR(200),
        movieLength INT(4),
        movieImgUrl VARCHAR(1000))';
     if(mysqli_query($connection,$sql))
     {
         echo "Table movies created.";
     }
     else
     {
         echo "Error ".mysqli_error($connection);
  
     }
   
     
    $sql="GRANT ALL ON cinema.* TO 'cinema-admin'@'localhost' IDENTIFIED BY '12345'";
    if(mysqli_query($connection,$sql))
    {
        echo "User created.";

    }
    else
    {
        echo "Error ".mysqli_error($connection);
    }
    mysqli_close($connection);
?>
