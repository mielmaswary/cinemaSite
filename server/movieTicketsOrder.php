<?php
         require_once('./dataBseConnection.php');
         require_once('../utils/echoHtml.php');
         require_once('../scssphp-1.6.0/scss.inc.php');

         echoHtmlBegin();
         echoHeader();
         echoMovieListContainerBegin();
              $movieName=$_GET['movieName'];
              $sql="SELECT * FROM movies WHERE movieName='$movieName'";
              $result=mysqli_query($connection,$sql);
              while($movieImgUrls=mysqli_fetch_array($result)){
                $movieImgUrl=$movieImgUrls['movieImgUrl'];
                echo'<div class="movie-ticket-info movie-img" style="background-image: url('.$movieImgUrl.')">
                          <h3>'.$movieName.'</h3>
                          <form class="movie-ticket-info-form" action="./cart.php">';
                          $movieDateTime=$_GET['movieDateTime'];
                          $sql2="SELECT * FROM halls WHERE movieName='$movieName' AND movieDateTime='$movieDateTime'";
                          $result2=mysqli_query($connection,$sql2);

                          while($movie=mysqli_fetch_array($result2)){
                               $cinemaName=$movie['cinemaName'];
                               $dateTime=$movie['movieDateTime'];  
                               $hallNumber=$movie['hallNumber'];
                               echo'<input type="hidden" name="cinemaName" value="'.$cinemaName.'">
                                    <input type="hidden" name="hallNumber" value="'.$hallNumber.'">
                                    <input type="hidden" name="dateTime" value="'.$dateTime.'">';      
                          }
                          
                            echo'<input type="hidden" name="movieName" value="'.$movieName.'">
                                <input class="movie-ticket-info-form-input" type="number" placeholder="כמה כרטיסים?" name="ticketsPurchasedQuantity" min="1"><br>
                                <input class="movie-ticket-info-form-input" type="text" placeholder="שם פרטי" name="awnerName"><br>
                                <input class="movie-ticket-info-form-input"  type="text" placeholder="שם משפחה" name="awnerLastName"><br>
                                <input class="movie-ticket-info-form-input" type="email" placeholder="כתובת דואל" name="awnerEmail"><br>
                                <input class="movie-ticket-info-form-input pre-purchase-button" type="submit" ><br>
                          </form>
                     </div>';
             }
             
         echoCloserDivTag();
         echoHtmlEnd();

?>