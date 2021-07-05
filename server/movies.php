<?php
     require_once('./dataBseConnection.php');
     require_once('../utils/echoHtml.php');
     require_once('../scssphp/scss.inc.php');

     echoHtmlBegin();
     echoHeader();
     echoMovieListContainerBegin();
     $sql="SELECT * FROM movies;";
     $result=mysqli_query($connection,$sql);
     while ($movies=mysqli_fetch_array($result)) {
         
        $movieName=$movies['movieName'];
        // $sql2="SELECT * FROM movies WHERE movieName='$movieName';";
        // $result2=mysqli_query($connection,$sql2);
        // $movie=mysqli_fetch_array($result2);
        $movieDescription=$movies['movieDescription'];
        $movieLength=$movies['movieLength'];
        $movieImgUrl=$movies['movieImgUrl'];
        // $ticketsAvailable=($hall['ticketsAvailable']>0?$hall['ticketsAvailable']:'אין מקומות פנויים');
     
        echo '<div class="card icon">';
           echo '
                  <div class="content ">
                       <div class="front movie-img" style="background-image: url('.$movieImgUrl.')">
                       </div>
                       <div class="back">';
                               echo "<h3>$movieName</h3></br>";
                               echo "<h6>$movieDescription</h6></br>";
                            //    echo 'מקומות פנויים: '.$ticketsAvailable.'</br>';
                               echo '<div class="blue-button"><span>מעבר לדף הסרט</span></div>';
                               echo '<div class="pink-button ticketsOrderBtn"><span>להזמנת כרטיסים</span></div>';
                      echo '</div>
                      <div  class="back ticketsOrderCard display-none">
                          <h5>הזמנת כרטיסים לסרט</h5>';
                          echo "<h4 id=\"mName\">$movieName</h4>";
                          echo '<form id="selectHallForm"  action="./movieTicketsOrder.php">';
                                     echo '<select  name="cinemaName" onchange="fetch_select(this.value,document.getElementById(\'mName\').innerHTML);">';
                                          echo '<option selected disabled >בחר בית קולנוע</option>';
                                          echo '<option value="glilot">גלילות</option>';
                                          echo '<option value="kfr-saba">כפר סבא</option>';
                                          echo '<option value="rashlats">ראשון לציון</option>';
                                          echo '<option value="jerusalem">ירושלים</option>';
                                          echo '<option value="beer-sheva">באר-שבע</option>';
                                     echo"</select></br>";
                                     echo '
                                         <select name="movieDateTime" id="new_select">
                                         </select>
                                      ';
                                 
                                     echo'<input type="hidden" name="movieName" value="'.$movieName.'">
                                     <input  type="submit" value="בצע הזמנה" class="blue-button">
                               </form>
                      </div>

                  </div>';
        echoCloserDivTag();
     }
     echoHtmlEnd();
?>
<script src="../client/js/movies.js"></script>

<?php
     mysqli_close($connection);
?>







