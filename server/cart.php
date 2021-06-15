<?php
       require('./dataBseConnection.php');
       require_once('../utils/echoHtml.php');


       $hallNumber=$_GET['hallNumber'];
       $movieName=$_GET['movieName'];
       $ticketsPurchasedQuantity=$_GET['ticketsPurchasedQuantity'];
       $awnerName=$_GET['awnerName'];
       $awnerLastName=$_GET['awnerLastName'];
       $awnerEmail=$_GET['awnerEmail'];

       $sql="SELECT ticketsAvailable FROM halls WHERE movieName='$movieName'";
       $result=mysqli_query($connection,$sql);
       $totalAvailableTickets=mysqli_fetch_array($result)['ticketsAvailable'];
       echo $totalAvailableTickets;


       function updateHallAvailableTickets($hallNumber,$movieName,$ticketsPurchasedQuantity,$totalAvailableTickets){
        require('./dataBseConnection.php');
 
             $sql="UPDATE halls SET ticketsAvailable=$totalAvailableTickets-$ticketsPurchasedQuantity WHERE number=$hallNumber";
             if(mysqli_query($connection,$sql))
             {
                 echo "hall updated. </br>";
                 echo "</br>";
             }
             else
             {
                 echo "לא ניתן לבצע את הפעולה".mysqli_error($connection);
                 echo "</br>";
             }
       }

       function updatePurchasedTickets($hallNumber,$movieName,$awnerName,$awnerLastName,$awnerEmail,$ticketsPurchasedQuantity){
        require('./dataBseConnection.php');
        $sql=" INSERT INTO purshasedTickets (hallNumber,movieName,awnerName,awnerLastName,awnerEmail,awnerTicketsQuantity)
                                         VALUES ($hallNumber,'$movieName','$awnerName','$awnerLastName','$awnerEmail','$ticketsPurchasedQuantity')";
             if(mysqli_query($connection,$sql))
             {
                 echo "purshasedTickets updated. </br>";
                 echo "</br>";
             }
             else
             {
                 echo "לא ניתן לבצע את הפעולה".mysqli_error($connection);
                 echo "</br>";
             }
        }

       echo '<div id="purchaseMsg" class="purchaseMsg">
                <div>אולם מספר: '.$hallNumber.'</div>
                <div>שם הסרט: '.$movieName.'</div>
                <div>שם הרוכש: '.$awnerName.' '.$awnerLastName.'</div>
                <div>אימייל: '.$awnerEmail.'</div>
                <div>מספר כרטיסים: '.$ticketsPurchasedQuantity.'</div>
             </div>';

       echo '<div id="purchaseMsgBtn" class="button">לאישור רכישה</div>';
       if(true){
           global $hallNumber,$movieName,$ticketsPurchasedQuantity,$totalAvailableTickets,$awnerName,$awnerLastName,$awnerEmail;
           updateHallAvailableTickets($hallNumber,$movieName,$ticketsPurchasedQuantity,$totalAvailableTickets);
           updatePurchasedTickets($hallNumber,$movieName,$awnerName,$awnerLastName,$awnerEmail,$ticketsPurchasedQuantity);
       }
       mysqli_close($connection);
?>
