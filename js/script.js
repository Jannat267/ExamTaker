document.getElementById("backpack").style.backgroundColor = "tomato";
var x = document.getElementsByClassName("lightblue");
var i;
for (i = 0; i < x.length; i++) {
    x[i].style.color = "Aqua";
}
var y = document.getElementsByClassName("card");
var j;
for (j = 0; j < y.length; j++) {
    y[j].style.borderRadius = "30px";
}


function remove() {
    var j;
    var btn = document.getElementsByClassName("btn-majenda");
    // for (j = 0; j < btn.length; j++) {
    btn.style.visibility = "hidden";
    // }
}