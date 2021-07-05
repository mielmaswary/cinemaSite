// require('../dataBseConnection.php')

const quantityChooseFields=document.getElementsByClassName('quantityChooseField');
const availableThicketsArr=document.getElementsByClassName('hallTickets')
const ticketsOrderFormBtn=document.getElementsByClassName('ticketsOrderFormBtn')
const ticketsOrderBtns=document.getElementsByClassName('ticketsOrderBtn');
const ticketsOrderCards=document.getElementsByClassName('ticketsOrderCard');
const cardsContent=document.getElementsByClassName('content');
const selectHallForm=document.getElementById('selectHallForm');
// const navbarMoviesBtn=document.getElementById("navbar-movies-btn");

// navbarMoviesBtn.addEventListener('click',()=>{
//    window.location.href="file:///C:/wamp64/www/firstphp/cinemaSite/server/movies.php";
// })



//tickets order form validaiton
for(let i=0;i<quantityChooseFields.length;i++){
   let availableThickets=availableThicketsArr[i].innerHTML.split(':')[1].trim()
   quantityChooseFields[i].addEventListener('keyup',()=>{
      if(availableThickets-quantityChooseFields[i].value>=0 && quantityChooseFields[i].value>0)
         ticketsOrderFormBtn[i].disabled=false
      else{
         ticketsOrderFormBtn[i].disabled=true
      }
   })
}


for(let i=0;i<ticketsOrderBtns.length;i++){
   ticketsOrderBtns[i].addEventListener('click',()=>{
      ticketsOrderCards[i].classList.remove('display-none');
      closeOtherOrderCards(i)
   })
}

const closeOtherOrderCards=(openedCardIndex)=>{
   for(let i=0;i<ticketsOrderBtns.length;i++){
      if(i!=openedCardIndex){
         ticketsOrderCards[i].classList.add('display-none')
         cardsContent[i].style.transform="";

      }      
   }
}

for(let i=0;i<ticketsOrderCards.length;i++){
      ticketsOrderCards[i].addEventListener('mouseleave',()=>{
           cardsContent[i].style.transform="rotateY(180deg)";
      })
}

// selectHallForm.firstChild.addEventListener('change',()=>{
//    document.cookie = "cinemaName"+"="+selectHallForm.firstChild.value;
// })

// selectHallForm.firstChild.addEventListener('focusin',()=>{
//    document.cookie = "cinemaName"+"="+"null";
// })

// function renderMovieDates() {
//    const xhttp = new XMLHttpRequest();

//    xhttp.open("GET", "http://localhost/firstphp/cinemaSite/server/movies.php", true);
//    xhttp.send();

// }

function fetch_select(val,movieName,movieIndex)
{
     $.ajax({
           type: 'post',
           url: 'http://localhost/firstphp/cinemaSite/utils/renderDates.php',
           data: {
              cityName:val,
              movieName:movieName
           },
           success: function (response) {
              document.getElementById("new_select"+movieIndex).innerHTML=response; 
           },
           error: function (xhr, ajaxOptions, thrownError) {
           alert(xhr.status);
           alert(thrownError);
       }
     });
}