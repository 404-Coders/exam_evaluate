function hideModal(id)
{
    var modal = document.getElementById(id);
    modal.style.transition = "all 500ms ease-in-out"
    modal.style.visibility = "hidden";
}

function showModal(id)
{
    var modal = document.getElementById(id);
    modal.style.transition = "all 500ms ease-in-out"

    modal.style.visibility = "visible";
}

var logout = document.getElementById('logout');

logout.addEventListener("click",()=>{
    window.location.href = "../../resources/php/logout.php";
})