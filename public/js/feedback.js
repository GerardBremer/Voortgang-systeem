var uitnodigenmodal = document.getElementById('uitnodigenmodal');

var uitnodigen = document.getElementById("feedbackbtn");

// Haal de knop voor annuleren op
var uitnodigenannuleer = document.getElementById("uitnodigenannuleer");

var uitnodigenspan = document.getElementsByClassName("close")[0];

uitnodigen.onclick = function() {
    uitnodigenmodal.style.display = "block";
}

uitnodigenspan.onclick = function() {
    uitnodigenmodal.style.display = "none";
}

// Sluit de popup als er op annuleren word geklikt
uitnodigenannuleer.onclick = function() {
    uitnodigenmodal.style.display = "none";
}

// Sluit de popup wanneer er buiten word geklikt
window.onclick = function(klikbuitenuitnodigen) {
    if (klikbuitenuitnodigen.target == uitnodigenmodal) {
        uitnodigenmodal.style.display = "none";
    }
}



var accepterenmodal = document.getElementById('accepterenmodal');

window.onload=function() { // when the page has loaded
  var bt = document.querySelectorAll(".accepterenbtn"); // get all buttons with the class
  for (var i=0;i<bt.length;i++) { // newer browsers can use forEach
    bt[i].onclick=function() { // assign anonymous handler
      accepterenmodal.style.display = "block";
    }
  }
}

// Haal de knop voor annuleren op
var accepterenannuleer = document.getElementById("accepterenannuleer");

var accepterenspan = document.getElementsByClassName("close")[1];



accepterenspan.onclick = function() {
    accepterenmodal.style.display = "none";
}

// Sluit de popup als er op annuleren word geklikt
accepterenannuleer.onclick = function() {
    accepterenmodal.style.display = "none";
}

// Sluit de popup wanneer er buiten word geklikt
window.onclick = function(klikbuitenaccepteren) {
    if (klikbuitenbekijken.target == uitnodigenmodal) {
        klikbuitenaccepteren.style.display = "none";
    }
}


function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
}