Waypoint;

let j = 0;
var waypoint = new Waypoint({
    element: document.getElementById('waypoint'),
    handler: function() {
        if(j % 2 == 0){
            document.getElementById("navLogoImg").style.visibility = "visible";
            j++;
        }
        else{
            document.getElementById("navLogoImg").style.visibility = "hidden";
            j--;
        }
    }
})