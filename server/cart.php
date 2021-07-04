<?php
        require_once('./dataBseConnection.php');
        require_once('../utils/echoHtml.php');
        require_once('../scssphp/scss.inc.php');

        echoHtmlBegin();
        echoHeader();
        echoMovieListContainerBegin();

       $cinemaName=$_GET['cinemaName'];
       $hallNumber=$_GET['hallNumber'];
       $dateTime=$_GET['dateTime'];
       $movieName=$_GET['movieName'];
       $ticketsPurchasedQuantity=$_GET['ticketsPurchasedQuantity'];
       $awnerName=$_GET['awnerName'];
       $awnerLastName=$_GET['awnerLastName'];
       $awnerEmail=$_GET['awnerEmail'];

       $sql="SELECT ticketsAvailable FROM halls WHERE movieName='$movieName'";
       $result=mysqli_query($connection,$sql);
       $totalAvailableTickets=mysqli_fetch_array($result)['ticketsAvailable'];


       function updateHallAvailableTickets($hallNumber,$movieName,$ticketsPurchasedQuantity,$totalAvailableTickets){
        require('./dataBseConnection.php');
 
             $sql="UPDATE halls SET ticketsAvailable=$totalAvailableTickets-$ticketsPurchasedQuantity WHERE hallNumber=$hallNumber";
             if(mysqli_query($connection,$sql))
             {
              
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
               
             }
             else
             {
                 echo "לא ניתן לבצע את הפעולה".mysqli_error($connection);
                 echo "</br>";
             }
        }

       echo '<div id="purchaseMsg" class="purchaseMsg">
                <h2>פרטי ההזמנה:</h2><br>
                <div>מקום: '.$cinemaName.'</div>
                <div>אולם מספר: '.$hallNumber.'</div>
                <div>תאריך ושעה: '.$dateTime.'</div>
                <div>שם הסרט: '.$movieName.'</div>
                <div>שם הרוכש: '.$awnerName.' '.$awnerLastName.'</div>
                <div>אימייל: '.$awnerEmail.'</div>
                <div>מספר כרטיסים: '.$ticketsPurchasedQuantity.'</div></br></br>
                <div id="purchaseMsgBtn" class="purchase-button">לאישור רכישה</div>
             </div>';
       if(true){
           global $hallNumber,$movieName,$ticketsPurchasedQuantity,$totalAvailableTickets,$awnerName,$awnerLastName,$awnerEmail;
           updateHallAvailableTickets($hallNumber,$movieName,$ticketsPurchasedQuantity,$totalAvailableTickets);
           updatePurchasedTickets($hallNumber,$movieName,$awnerName,$awnerLastName,$awnerEmail,$ticketsPurchasedQuantity);
        //    mail("miel1983@gmail.com","check","Is it work???");
       }
       mysqli_close($connection);

       echoCloserDivTag();
       echoHtmlEnd();
?>
