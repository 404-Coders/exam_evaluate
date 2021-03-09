// Hide
document.addEventListener("DOMContentLoaded",()=>{
    var responsiveContent = document.getElementById('responsiveContent');
    var responsive = document.getElementById('responsive');
    var bodyContent = document.getElementById('bodyContent');

    // console.log(screen.width); 
    if (window.innerWidth<1024) {
        responsiveContent.style.display="flex";
        responsiveContent.style.justifyContent="center";
        responsiveContent.style.alignItems="center";
        responsiveContent.style.width="100vw";
        responsiveContent.style.height="100vh";
        responsiveContent.style.background="#FDBF43";
        responsiveContent.style.color="#017296";
        responsive.style.display = "block";
        bodyContent.style.display = "none";
    }
    else{
        responsiveContent.removeAttribute("style");
        responsiveContent.style.display="none";
        responsive.style.display = "none";
        bodyContent.style.display = "block";
    }
});
window.addEventListener("resize",()=>{
    var responsiveContent = document.getElementById('responsiveContent');
    var responsive = document.getElementById('responsive');
    var bodyContent = document.getElementById('bodyContent');

    // console.log(screen.width); 
    if (window.innerWidth<1024) {
        responsiveContent.style.display="flex";
        responsiveContent.style.justifyContent="center";
        responsiveContent.style.alignItems="center";
        responsiveContent.style.width="100vw";
        responsiveContent.style.height="100vh";
        responsiveContent.style.background="#FDBF43";
        responsiveContent.style.color="#017296";
        responsive.style.display = "block";
        bodyContent.style.display = "none";
    }
    else{
        responsiveContent.removeAttribute("style");
        responsiveContent.style.display="none";
        responsive.style.display = "none";
        bodyContent.style.display = "block";
    }
});
