window.addEventListener("DOMContentLoaded" , function(){

    let nomChant = document.querySelector('#nomChant');
    let adresseChant = document.querySelector('#adresseChant');
    let spanChant = document.querySelector('#spanChant');

    let regexTaille = /^.{1,50}$/;

    nomChant.addEventListener("keyup",()=>{
        if(regexTaille.test(nomChant.value)==false){
            spanChant.innerHTML = "Le nom du chantier doit contenir entre 1 et 50 caractères maximum";
        }
        else{
            spanChant.innerHTML = "";
        }
    });
    adresseChant.addEventListener("keyup",()=>{
        if(regexTaille.test(adresseChant.value) == false){
            spanChant.innerHTML = "L'adresse doit contenir entre 1 et 50 caractères maximum";
        }
        else{
            spanChant.innerHTML = "";
        }
    });
});