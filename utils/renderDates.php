<?php
        require_once('./echoHtml.php');
        $connection=mysqli_connect('localhost','cinema-admin','12345');
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
          
         if(isset($_POST['cityName'])){
               $cinemaName=$_POST['cityName'];
               $movieName=$_POST['movieName'];
               $sql3="SELECT * FROM halls WHERE cinemaName='$cinemaName' AND movieName='$movieName'";
               $result3=mysqli_query($connection,$sql3);
                           
               echo '<option selected disabled >בחר תאריך</option>';
                     while($movieDateTimes=mysqli_fetch_array($result3)){
                           $movieDateTime=$movieDateTimes['movieDateTime'];
                           echo'<option class="selectOption" value="'.$movieDateTime.'">'.$movieDateTime.'</option>'; 
 
                         }
        }
?>