function affiche() {
    let mail = document.getElementById("email").value;
    let pwd = document.getElementById("passwordField").value;
    let username= document.getElementById("username").value;
    let affErrEmail=document.getElementById("sp-email");
    let affErrName= document.getElementById("sp-name");
    let affErrPassword= document.getElementById("sp-password");
    let regexEmail=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    let regexPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    var regexName=/^[A-Za-z]+$/;

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
    else if (!regexPassword.test(pwd)) {
        affErrPassword.innerHTML = "Password should be a minimum of 8 characters,<br>at least one letter, and one number";
        Check=false;
    }
    else{
        affErrPassword.innerHTML = "";
    }

    //Username
    if(username==""){
        affErrName.innerHTML  = "this field must be filled out ";
    }
    else if (!regexName.test(username)) {
        affErrName.innerHTML = "Username should only contains letters";
        Check=false;
    }
    else{
        affErrName.innerHTML = "";
    }

    return Check;

}


const signupBtn = document.getElementById("signup-btn");
signupBtn.addEventListener("click", function (event) {
    event.preventDefault();
    let checker = affiche();
    if(checker) sendRegisterInfos();
})


function sendRegisterInfos() {
    // Collect form data
    var formData = {
        username: $("#username").val(),
        email: $("#email").val(),
        password: $("#passwordField").val(),
    };
    console.log(formData)

    $.ajax({
        type: "POST",
        url: "index.php?page=register",
        data: formData,
        signup: true,
        success: function (data) {

            console.log(data);

            if (data === "success") {
                window.location.href = "index.php?page=login";
            } else if (data=== "User exist"){
                alert(data);
            }
        }
    })

}
