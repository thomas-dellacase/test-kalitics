window.addEventListener("DOMContentLoaded" , function(){

    let matriculeCo = document.querySelector('#matriculeCo');
    let mdp = document.querySelector('#passwordCo');
    let formCo = document.querySelector('#formCo');
    let spanCo = document.querySelector('#spanCo');
    let formIns = document.querySelector('#formIns');
    let spanIns = document.querySelector('#spanIns');
    let nom = document.querySelector('#nom');
    let prenom = document.querySelector('#prenom');
    let password = document.querySelector('#password');
    let password2 = document.querySelector('#password2');
    let matricule = document.querySelector('#matricule');

    let regexNumberCo = /^[0-9]{2}/;
    let regexLetterCo = /[A-Z]{3}$/;
    let regexTailleCo = /^.{5}$/
    let regexTaillenom = /^.{1,50}$/;
    let regextaillespdw = /^.{6,}$/;




    formCo.addEventListener("keyup",()=>{
        console.log(regexNumberCo.test(matricule.value));
        console.log(regexLetterCo.test(matricule.value));
        console.log(regexTailleCo.test(matricule.value));
        if(regexNumberCo.test(matriculeCo.value) == false) {
            spanCo.innerHTML = "Le matricule doit commencer par 2 chiffres";
        }
        else if(regexLetterCo.test(matriculeCo.value) == false) {
            spanCo.innerHTML = "Le matricule doit finir par 3 lettres";
        }
        else if(regexTailleCo.test(matriculeCo.value) == false) {
            spanCo.innerHTML = "Le matricule doit contenir 5 caractères";
        }
        else{
            spanCo.innerHTML = "";
        }
    });
    nom.addEventListener("keyup",()=>{
        if(regexTaillenom.test(nom.value)==false){
            spanIns.innerHTML = "Le nom doit contenir entre 1 et 50 caractères maximum";
        }
        else{
            spanIns.innerHTML = "";
        }
    });



    prenom.addEventListener("keyup",()=>{
        if(regexTaillenom.test(prenom.value) == false){
            spanIns.innerHTML = "Le prenom doit contenir entre 1 et 50 caractères maximum";
        }
        else{
            spanIns.innerHTML = "";
        }
    });
    matricule.addEventListener("keyup",()=>{
        if(regexNumberCo.test(matricule.value) == false) {
            spanIns.innerHTML = "Le matricule doit commencer par 2 chiffres";
        }
        else if(regexLetterCo.test(matricule.value) == false) {
            spanIns.innerHTML = "Le matricule doit finir par 3 lettres";
        }
        else if(regexTailleCo.test(matricule.value) == false) {
            spanIns.innerHTML = "Le matricule doit contenir 5 caractères";
        }
        else{
            spanIns.innerHTML = "";
        }
    });
    password.addEventListener("keyup",()=>{
        if(regextaillespdw.test(password.value) == false){
            spanIns.innerHTML = "Le mot de passe doit contenir au moins 6 caractères";
        }
        else{
            spanIns.innerHTML = "";
        }
    });
    password2.addEventListener("keyup",()=>{
        if(regextaillespdw.test(password2.value) == false){
            spanIns.innerHTML = "Le mot de passe doit contenir au moins 6 caractères";
        }
        else{
            spanIns.innerHTML = "";
        }
    });

    
    
});