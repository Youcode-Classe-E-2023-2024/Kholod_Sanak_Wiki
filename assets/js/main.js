function affiche() {
    let mail = document.getElementById("email").value;
    let pwd = document.getElementById("passwordField").value;
    let affErrEmail=document.getElementById("sp-email");

    let affErrPassword= document.getElementById("sp-password");
    let regexEmail=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;


    let Check=true;

    //Mail
    if(mail==""){
        affErrEmail.innerHTML = "this field must be filled out ";

    } else  if (!regexEmail.test(mail) ) {
        affErrEmail.innerHTML = "Invalid email address  ";
        Check=false;
    }
    else{
        affErrEmail.innerHTML ="";
    }

    //Password (Minimum eight characters, at least one letter and one number)
    if(pwd==""){
        affErrPassword.innerHTML  = "this field must be filled out ";
    }

    else{
        affErrPassword.innerHTML = "";
    }




}






const signinBtn = document.getElementById("signin-btn");


signinBtn.addEventListener("click", function (event) {
    event.preventDefault();
    //console.log("clicked");
    affiche();
})