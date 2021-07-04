<?php
    require_once('./dataBseConnection.php');
    require_once('../utils/echoHtml.php');
    echoHtmlBegin();
    echoHeader();
    echo  '<div class="admin-edit-panel-container display-none">';

    if(isset($_GET['newMovieName']))
    {
        $newMovieName=$_GET['newMovieName'];
        $newMovieDescription=$_GET['newMovieDescription'];
        $newMovieLength=$_GET['newMovieLength'];
        $newMovieImg=$_GET['newMovieImgToUpload'];
        
        $sql="INSERT INTO movies (movieName, movieDescription, movieLength, movieImgUrl)
              VALUES('$newMovieName','$newMovieDescription',$newMovieLength,'$newMovieImg');";
        if(mysqli_query($connection,$sql))
        {
            echo "New movie was added. </br>";
            echo "</br>";
        }
        else
        {
            echo "Error ".mysqli_error($connection);
            echo "</br>";
        }
    }
    if(isset($_GET['movieName']))
    {
        $cinemaName=$_GET['cinemaName'];
        $hallNumber=$_GET['hallNumber'];
        $movieDateTime=str_replace('T'," ",$_GET['movieDateTime']);
        $movieName=$_GET['movieName'];
        $ticketsAvailable=$_GET['ticketsAvailable'];

        $sql="UPDATE halls SET
        movieName='$movieName',
        movieDateTime='$movieDateTime',
        ticketsAvailable=$ticketsAvailable
        WHERE cinemaName='$cinemaName' AND hallNumber=$hallNumber";
        if(mysqli_query($connection,$sql))
        {
            // echo "hall updated. </br>";
            echo "</br>";
        }
        else
        {
            echo "Error ".mysqli_error($connection);
            echo "</br>";
        }
    }
    echo '<div class="purchasedTicketsContainer display-none">';
    echo '<h2>כרטיסים שנרכשו:</h2>';

    $sql='SELECT * FROM  purshasedTickets';
    $result=mysqli_query($connection,$sql);
    while ($purchasedTicket=mysqli_fetch_array($result)) {
        $id=$purchasedTicket['id'];
        $hallNumber=$purchasedTicket['hallNumber'];
        $movieName=$purchasedTicket['movieName'];
        $awnerName=$purchasedTicket['awnerName'];
        $awnerLastName=$purchasedTicket['awnerLastName'];
        $awnerEmail=$purchasedTicket['awnerEmail'];
        $awnerTicketsQuantity=$purchasedTicket['awnerTicketsQuantity'];
        echo '<div class="purchasedThicketInfoBlock ">';
              echo '<div class="purchasedThicketInfo">מספר סידורי: '.$id. '</div>';
              echo '<div class="purchasedThicketInfo"> אולם מספר:'.$hallNumber.'</div>';
              echo '<div class="purchasedThicketInfo"> שם הסרט: '.$movieName.'</div>';
              echo '<div class="purchasedThicketInfo">שם:'.$awnerName. '</div>';
              echo '<div class="purchasedThicketInfo">משפחה:'.$awnerLastName.'</div>';
              echo '<div class="purchasedThicketInfo"> אימייל: '.$awnerEmail.'</div>';
              echo '<div class="purchasedThicketInfo">מספר כרטיסים:'.$awnerTicketsQuantity. '</div></br></br>';
        echo '</div>';
     }
     echoCloserDivTag();

?>
<h2>עדכון סרט חדש</h2>
<form class="admin-panel-form" action="./admin.php">
    <input class="admin-edit-input" type="text" name="newMovieName" placeholder="שם הסרט"></br>
    <input class="admin-edit-input" type="text" name="newMovieDescription" placeholder="תיאור הסרט"></br>
    <input class="admin-edit-input" type="number" name="newMovieLength" placeholder="אורך בדקות"></br>
    <input class="admin-edit-input" type="text" name="newMovieImgToUpload" placeholder="בחר תמונה"></br>
    <input class="admin-edit-form-button" type="submit">
</form>

<h2>עדכון אולם</h2>
<form class="admin-panel-form" action="./admin.php">
    <select class="admin-edit-input" name="cinemaName" placeholder="שם בית הקולנוע">
          <option value="glilot">גלילות</option>
          <option value="kfr-saba">כפר סבא</option>
          <option value="beer-sheva">באר שבע</option>
          <option value="rashlats">ראשלצ</option>
          <option value="jerusalem">ירושלים</option>
    </select></br>
    <input class="admin-edit-input" type="number" name="hallNumber" placeholder="מספר האולם" min=1 max=6></br>
    <input class="admin-edit-input" type="datetime-local" name="movieDateTime" placeholder=" תאריך ושעה"></br>
    <select class="admin-edit-input" name="movieName" placeholder="שם הסרט">
           <?php
                $sql='SELECT * FROM movies';
                $result=mysqli_query($connection,$sql);
                while($movies=mysqli_fetch_array($result)){
                      $movieName=$movies['movieName'];
                      echo'<option value="'.$movieName.'">'.$movieName.'</option>'; 
                }
                mysqli_close($connection);
           ?>
    </select></br>
    <input class="admin-edit-input" type="number" name="ticketsAvailable" placeholder="מקומות פנויים" min=0></br>
    <input class="admin-edit-form-button" type="submit">
</form>

<?php
    echoCloserDivTag(); 
    echoHtmlEnd();
?>

