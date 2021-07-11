
const adminPanelForm=document.getElementById('admin-panel-form')
const adminEditFormButton=document.getElementsByClassName('admin-edit-form-button')[0]
function isValidFields(form){
    const formFields=form.getElementsByClassName('admin-edit-input')
    for(let field of formFields){
       if(field.value==undefined ||
          field.value=="" ||
          field.value=="בחר בית קולנוע")
               return false        
    }
    return true
     
 }
 adminPanelForm.addEventListener('mouseover',()=>{
    if(isValidFields(adminPanelForm))
       adminEditFormButton.disabled=false
    else
       adminEditFormButton.disabled=true
})
