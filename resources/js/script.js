var signinBtn = document.getElementById("signinBtn");
var signupBtn = document.getElementById("signupBtn");
var register = document.getElementById("register");


signinBtn.addEventListener("click", () => {
    document.location.href = "./login/index.html";
})

signupBtn.addEventListener("click", () => {
    register.style.opacity="1";
    register.style.visibility="visible";
    var body = document.getElementById("body");
    body.style.filter="blur(4px)";
    register.style.transform="opacity 50ms ease-in-out, visibility 0s linear 50ms";
})

var rcontent = document.getElementById("rContent");

rcontent.addEventListener("click",()=>{
    register.style.opacity="0";
    register.style.visibility="hidden";
    var body = document.getElementById("body");
    body.style.filter="none";
    console.log("not Worlking");
})
function hideOverlay(){
    
}