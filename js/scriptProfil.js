window.addEventListener("DOMContentLoaded" , function(){

    let nomUp = document.querySelector('#nomUp');
    let prenomUp = document.querySelector('#prenomUp');
    let passwordUp = document.querySelector('#passwordUp');
    let password2Up = document.querySelector('#passwordUp2');
    let matriculeUp = document.querySelector('#matriculeUp');
    let formUp = document.querySelector('#formUp');
    let spanUp = document.querySelector('#spanUp');

    let regexTaillenom = /^.{1,50}$/;
    let regextaillespdw = /^.{6,}$/;
    let regexNumber = /^[0-9]{2}/;
    let regexLetter = /[A-Z]{3}$/;
    let regexTaille = /^.{5}$/
    
    matriculeUp.addEventListener("keyup",(e)=>{
        if(regexNumber.test(matriculeUp.value) == false) {
            spanUp.innerHTML = "Le matricule doit commencer par 2 chiffres";
            e.preventDefault();
        }
        else if(regexLetter.test(matriculeUp.value) == false) {
            spanUp.innerHTML = "Le matricule doit finir par 3 lettres";
            e.preventDefault();
        }
        else if(regexTaille.test(matriculeUp.value) == false) {
            spanUp.innerHTML = "Le matricule doit contenir 5 caractères";
            e.preventDefault();
        }
        else{
            spanUp.innerHTML = "";
        }
    });
    nomUp.addEventListener("keyup",(e)=>{
        if(regexTaillenom.test(nomUp.value) == false){
            spanUp.innerHTML = "Le nom doit contenir entre 1 et 50 caractères maximum";
            e.preventDefault();
        }
        else{
            spanUp.innerHTML = "";
        }

    });
    prenomUp.addEventListener("keyup",(e)=>{
        if(regexTaillenom.test(prenomUp.value) == false){
            spanUp.innerHTML = "Le prenom doit contenir entre 1 et 50 caractères maximum";
            e.preventDefault();
        }
        else{
            spanUp.innerHTML = "";
        }

    });
    passwordUp.addEventListener("keyup",(e)=>{
        if(regextaillespdw.test(passwordUp.value) == false){
            spanUp.innerHTML = "Le mot de passe doit contenir au moins 6 caractères";
            e.preventDefault();
        }
        else{
            spanUp.innerHTML = "";
        }


    });
    password2Up.addEventListener("keyup",(e)=>{
        if(passwordUp.value != password2Up.value){
            spanUp.innerHTML = "Les mots de passe ne correspondent pas";
            e.preventDefault();
        }
        else{
            spanUp.innerHTML = "";
        }

    });

    });
