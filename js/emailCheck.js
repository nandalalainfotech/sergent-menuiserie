var eForm = document.getElementById('check');
var mail = document.getElementById('mail');


eForm.addEventListener('submit',function(event){
    if(!validationInputs()){
        event.preventDefault();
    }
   
});

function validationInputs(){
    let mailVal = mail.value;
    let flag = true;

     if(mailVal.trim()==''){
         alert("Please enter an e-mail address.");
         flag = false;
     }
    else if(!validation(mailVal)){
        alert('Invalid e-mail address');
        flag = false;
    }
    return flag;
}

function validation(value){
    let validRegex =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      return  String(value).toLowerCase().match(validRegex);   
}

