var signinBtn = document.getElementById("signinBtn");
var signupBtn = document.getElementById("signupBtn");

signinBtn.addEventListener("click", () => {
    document.location.href = "./Login/index.html";
})

signupBtn.addEventListener("click", () => {
    var register = document.getElementById("register");
    register.style.opacity="1";
    register.style.visibility="visible";
    var body = document.getElementById("body");
    body.style.filter="blur(4px)";
    register.style.transform="opacity 50ms ease-in-out, visibility 0s linear 50ms";
})


function hideOverlay(){
    var register = document.getElementById("register");
    register.style.opacity="0";
    register.style.visibility="hidden";
    var body = document.getElementById("body");
    body.style.filter="none";
    console.log("not Worlking");
}