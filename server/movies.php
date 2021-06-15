<?php

     require_once('./dataBseConnection.php');
     require_once('../utils/echoHtml.php');
     require_once('../scssphp/scss.inc.php');
    


     echo '<html>
               <head>
                     <meta charset="UTF-8">
                     <meta http-equiv="X-UA-Compatible" content="IE=edge">
                     <meta name="viewport" content="width=device-width, initial-scale=1.0">
                     <link rel="stylesheet" href="../client/styles/style.scss">
                     <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
                     <title>סרטים</title>
               </head>
               <body>';
          
     $sql="SELECT * FROM movies;";
     $result=mysqli_query($connection,$sql);
   
     echo '
         <div class="header">
             <div class="contact">
                 <span class="bright-blue">03-0000000</span>
                 <span class="bright-blue">sinema@sinema.com</span>
                 <div class="icon facebook-logo social-icon"></div>
                 <div class="icon instegram-logo social-icon"></div>
             </div>
             <ul class="navBar">
                 <span>ילדים</span>
                 <span>הופעות</span>
                 <span>מתחמים</span>
                 <span>VIP</span>
                 <span>הנחיות קורונה</span>
                 <div class="cinema-logo icon"></div>
                 <input class="search-field" type="text" placeholder="חיפוש"></inupt>
                 <button class="pink-button">הזמן כרטיסים</button>
             </ul>
         </div>';
     echo '<div class="movies-list-container">';
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
                               echo 'שם הסרט: '.$movieName.'</br>';
                               echo 'תיאור: '.$movieDescription.'</br>';
                            //    echo 'מקומות פנויים: '.$ticketsAvailable.'</br>';
                      echo '</div>
                  </div>';
      echo '</div>';
     }
     echo '</div>';
     echo '</body>';
     mysqli_close($connection);
?>
<script src="../client/js/movies.js"></script>







