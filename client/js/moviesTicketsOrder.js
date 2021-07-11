
const movieTicketInfoForm=document.getElementById('movie-ticket-info')
const prePurchaseButton=document.getElementsByClassName('pre-purchase-button')[0]
function isValidFields(form){
    const formFields=form.getElementsByClassName('movie-ticket-info-form-input')
    for(let field of formFields){
       if(field.value==undefined ||
          field.value=="" ||
          field.value=="בחר בית קולנוע")
               return false        
    }
    return true
     
 }
movieTicketInfoForm.addEventListener('mouseover',()=>{
    if(isValidFields(movieTicketInfoForm))
       prePurchaseButton.disabled=false
    else
       prePurchaseButton.disabled=true
})
