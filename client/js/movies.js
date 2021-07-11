
const quantityChooseFields=document.getElementsByClassName('quantityChooseField');
const availableThicketsArr=document.getElementsByClassName('hallTickets')
const ticketsOrderFormBtn=document.getElementsByClassName('ticketsOrderFormBtn')
const ticketsOrderBtns=document.getElementsByClassName('ticketsOrderBtn');
const ticketsOrderCards=document.getElementsByClassName('ticketsOrderCard');
const cardsContent=document.getElementsByClassName('content');
const selectHallForm=document.getElementById('selectHallForm');
const blueOrderBtn=document.getElementsByClassName('blue-button orderBtn');


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

const closeOtherOrderCards=(openedCardIndex)=>{
   for(let i=0;i<ticketsOrderBtns.length;i++){
      if(i!=openedCardIndex){
         ticketsOrderCards[i].classList.add('display-none')
         cardsContent[i].style.transform="";

      }      
   }
}
for(let i=0;i<ticketsOrderBtns.length;i++){
   ticketsOrderBtns[i].addEventListener('click',()=>{
      ticketsOrderCards[i].classList.remove('display-none');
      closeOtherOrderCards(i)
   })
}

//validation in card order form at home page
for(let i=0;i<ticketsOrderCards.length;i++){
   ticketsOrderCards[i].addEventListener('mouseover',()=>{
        if(isValidFields(ticketsOrderCards[i]))
           blueOrderBtn[i].disabled=false
        else
           blueOrderBtn[i].disabled=true
   })
}


function isValidFields(form){
   const formFields=form.getElementsByTagName('select')
   for(let field of formFields){
      if(field.value==undefined ||
         field.value=="" ||
         field.value=="בחר בית קולנוע")
              return false        
   }
   return true
    
}


for(let i=0;i<ticketsOrderCards.length;i++){
      ticketsOrderCards[i].addEventListener('mouseleave',()=>{
           cardsContent[i].style.transform="rotateY(180deg)";
      })
}


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

