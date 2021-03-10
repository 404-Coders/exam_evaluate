// Hide

var all = document.querySelector("*");  
if (window.getComputedStyle(all).display === "none")
{
    console.log("wordking");
    all.style.display="flex";
    all.style.justifyContent="center";
    all.style.alignItems="center";
    all.style.width="100vw";
    all.style.height="100vh";
    all.style.background="#FDBF43";
    all.style.color="#017296";
    all.innerHTML="<h1 id='responsive' style='text-align:center;display:flex;align-items:center;justify-content: center;height: calc(100vh - 20px);color: #017296;margin: 0;padding: 0;' >Please Visit From Desktop</h1>";
}
// else{
//     var responsive = document.getElementById('responsive');
//     responsive.style.display="none";    
// }
