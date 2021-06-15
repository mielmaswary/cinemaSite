// require('../dataBseConnection.php')

const quantityChooseFields=document.getElementsByClassName('quantityChooseField');
const availableThicketsArr=document.getElementsByClassName('hallTickets')
const ticketsOrderFormBtn=document.getElementsByClassName('ticketsOrderFormBtn')


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