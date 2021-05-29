<?php

    if(isset($_GET['movieName']))
    {
        require_once('./dataBseConnection.php');
        $hallNumber=$_GET['hallNumber'];
        $movieName=$_GET['movieName'];
        $ticketsAvailable=$_GET['ticketsAvailable'];

        $sql="UPDATE halls SET movieName='$movieName' WHERE number=$hallNumber";
        if(mysqli_query($connection,$sql))
        {
            echo "hall updated. </br>";
            echo "</br>";
    
        }
        else
        {
            echo "Error ".mysqli_error($connection);
            echo "</br>";
        }

        $sql="UPDATE halls SET ticketsAvailable=$ticketsAvailable WHERE number=$hallNumber";
        if(mysqli_query($connection,$sql))
        {
            echo "hall updated. </br>";
            echo "</br>";
    
        }
        else
        {
            echo "Error ".mysqli_error($connection);
            echo "</br>";
    
        }
    }

?>
<form action="./admin.php">
    <input type="number" name="hallNumber" placeholder="מספר האולם"></br>
    <input type="text" name="movieName" placeholder="שם הסרט"></br>
    <input type="text" name="ticketsAvailable" placeholder="מקומות פנויים"></br>
    <input type="submit">
</form>

