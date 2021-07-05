<?php

     function echoHtmlBegin(){
          echo '<html>
                    <head>
                          <meta charset="UTF-8">
                          <meta http-equiv="X-UA-Compatible" content="IE=edge">
                          <meta name="viewport" content="width=device-width, initial-scale=1.0">
                          <link rel="stylesheet" href="../client/styles/style.scss">
                          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                          <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
                          <title>סרטים</title>
                    </head>
                    <body>';
     }

     function echoHeader(){
          echo '
          <div class="header">
              <div class="contact">
                  <span class="bright-blue">03-0000000</span>
                  <span class="bright-blue">sinema@sinema.com</span>
                  <div class="icon facebook-logo social-icon"></div>
                  <div class="icon instegram-logo social-icon"></div>
              </div>
              <ul class="navBar">
                  <span><a href="../server/movies.php">סרטים</a></span>
                  <span>הופעות</span>
                  <span>מתחמים</span>
                  <span>VIP</span>
                  <span>הנחיות קורונה</span>
                  <div class="cinema-logo icon"></div>
                  <input class="search-field" type="text" placeholder="חיפוש"></inupt>
                  <button class="pink-button">הזמן כרטיסים</button>
              </ul>
          </div>';
       }

     function echoMovieListContainerBegin(){
          echo '<div class="movies-list-container">';
     }
     function echoCloserDivTag()
     {
          echo '</div>';
     }

     function echoHtmlEnd(){
          echo '</body></html>';
     }

     function renderMovieDates(){
         
             
             
     }
?>
