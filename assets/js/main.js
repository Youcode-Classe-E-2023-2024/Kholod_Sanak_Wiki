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
    return Check;


}



const LoginBtn = document.getElementById("login-btn");

LoginBtn.addEventListener("click", function (event) {
    event.preventDefault();
    let checker = affiche();
    if(checker) sendLoginInfos();})

function sendLoginInfos(){
    var formData = {

        email: $("#email").val(),
        password: $("#passwordField").val(),
    };
    //console.log(formData)

    // Send the form data using AJAX
    $.ajax({
        type: "POST",
        url: "index.php?page=login",
        data: formData,
        signin: true,

        success: function (data) {

            console.log(data);

            if (data === "success author") {
                window.location.href = "index.php?page=home";
                alert("Welcome to Wikis");
            } else if(data== "success admin"){
                window.location.href = "index.php?page=dashboard";
                alert("Welcome to the Dashboard");
            }
            else if (data=== "Invalid email or password format. Please check your inputs."){
                alert("Invalid email or password format");
            }else if (data=== "Invalid user role. Please contact support."){
                alert("Invalid user role. Please contact support.");
            } else if (data=== "Invalid email or password. Please try again."){
                alert("Invalid email or password. Please try again.");
            }else if (data=== "User not found. Please check your email and try again."){
                alert("User not found. Please check your email and try again.");
            }
        }
    })

}