var login_details = document.getElementById("login_details");
var login_form = document.getElementById("login_form");
var login_btn1 = document.getElementById("login_btn1");
var login_btn2 = document.getElementById("login_btn2");
var login_buttons =document.getElementById("login_buttons");
var loginImg = document.getElementById("loginImg");
var imgBorder = document.getElementById("imgBorder");
var teacherInput =  document.getElementById("teacherInput");
var studentInput =  document.getElementById("studentInput");
var role = document.getElementById("role");
var role1 = document.getElementById("role1");
var form = document.getElementById("form");
var stu_details = document.querySelectorAll(".input2");
var tea_details = document.querySelectorAll(".input");


login_btn1.addEventListener("click",()=>{ //For Teacher
    form.action="../resources/php/teach_login.php";
    
    // login_details.style.transform="translate(100%)";
    login_form.style.transform="translate(-65%)";
    login_form.style.border="2px solid #017296";
    role.innerHTML="Student";
    role1.innerHTML="Teacher";
    
    role1.style.color="#FDBF43";
    
    login_buttons.style.transform="translate(65%)";
    login_btn1.style.display="none"; 
    login_btn2.style.display="block";
    login_details.style.background="#017296";
    loginImg.src ="../resources/images/class.svg";
    imgBorder.style.border="solid 2px #017296";
    teacherInput.style.display="flex";
    studentInput.style.display="none";

    stu_details.forEach(function(elem){
        elem.setAttribute("disabled","");
    })

    tea_details.forEach(function(elem){
        if(elem.hasAttribute("disabled")){
            elem.removeAttribute("disabled");
        }
    })

})




login_btn2.addEventListener("click",()=>{ //For Student
    // login_details.style.transform="translate(100%)";
    tea_details.forEach(function(elem){
        elem.setAttribute("disabled","");
    })

    stu_details.forEach(function(elem){
        if(elem.hasAttribute("disabled")){
            elem.removeAttribute("disabled");
        }
    })
    
    login_form.style.transform="translate(65%)";
    form.action="../resources/php/student_login.php"

    login_form.style.border="2px solid #FDBF43";
    role.innerHTML="Teacher";
    role1.innerText="Student";
    role1.style.color="#017296";

    login_buttons.style.transform="translate(0%)";
    login_btn2.style.display="none"; 
    login_btn1.style.display="block";

    
    login_details.style.background="#FDBF43";
    loginImg.src ="../resources/images/reading.svg";
    imgBorder.style.border="solid 2px #FDBF43";
    teacherInput.style.display="none";
    studentInput.style.display="flex";

    // stu_details.forEach(function(elem){
    //     elem.add();
    // })
    
})