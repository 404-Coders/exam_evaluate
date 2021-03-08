var signinBtn = document.getElementById("signinBtn");
var signupBtn = document.getElementById("signupBtn");
var register = document.getElementById("register");

signinBtn.addEventListener("click", () => {
    document.location.href = "./login/";
})

signupBtn.addEventListener("click", () => {
    register.style.opacity="1";
    var body = document.getElementById("body");

    register.style.visibility="visible";
    body.style.overflow="hidden";
    register.style.transform="opacity 50ms ease-in-out, visibility 0s linear 50ms";
})

var rcontent = document.getElementById("rContent");

rcontent.addEventListener("click",()=>{
    register.style.opacity="0";
    var body = document.getElementById("body");
    body.style.overflowY="auto";

    register.style.visibility="hidden";
    var body = document.getElementById("body");
    body.style.filter="none";
    console.log("not Worlking");
});


function validateForm() {
    var tea_name = document.getElementById("tea_name");
    var tea_pass = document.getElementById("tea_pass");
    var tea_con_pass = document.getElementById("tea_con_pass");

    if(tea_name.value.match(/^[A-Z a-z]+$/))
    {
        if(tea_con_pass.value === tea_pass.value)
        {
            return true;
        }
        else
        {
            swal("Error", "Password Does not Match!", "error");
            return false;
        }
    }
    else
    {
        swal("Error", "Please Enter a valid name", "error");
        return false;
    }

}

// Hide

// var all = document.querySelector("*");
// if (window.getComputedStyle(all).display === "none")
// {
//     console.log("wordking");
//     all.innerHTML="<h1 style='text-align:center;display:flex; align-items:center;' >Please Visit From Desktop</h1>";
// }