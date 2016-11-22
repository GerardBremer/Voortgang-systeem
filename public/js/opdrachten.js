// BEGIN TOON EN VERBERG KOLOMMEN 

// Toon lopende opdrachten met animatie wanneer de pagina geladen wordt
window.onload = function() {
   $('.lopendeopdrachtendiv').slideToggle('slow');
    $('.opdrachtdetails').slideToggle('slow');
    $('.leereenhedendiv').slideToggle('slow');
};

// Toon of verberg lopende opdrachten met animatie na het klikken op lopende opdrachten header
$('#lopendeopdrachten').click(function() {
    $('.lopendeopdrachtendiv').slideToggle('slow');
});

// Toon of verberg afgeronde opdrachten met animatie na het klikken op afgeronde opdrachten header
$('#afgerondeopdrachten').click(function() {
    $('.afgerondeopdrachtendiv').slideToggle('slow');
});

// Toon of verberg leereenheden met animatie na het klikken op een opdracht
//$('.opdracht').click(function() {
//    $('.leereenhedendiv').slideToggle('slow');
//});

// Toon of verberg opdrachten details met animatie na het klikken op een opdracht
//$('.opdracht').click(function() {
 //   $('.opdrachtdetails').slideToggle('slow');
//});

$("#lopendeopdrachten").click(function(){
    $(".chevronuprotate").toggleClass("down")  ;
})

$("#afgerondeopdrachten").click(function(){
    $(".chevrondownrotate").toggleClass("up")  ;
})


jQuery('.clickable').click(function(){
    jQuery('.clickable').removeClass('active');
    jQuery(this).addClass('active');
});

$('.opdracht').click(function(){
    selectOpdracht(this.value)
    selectOpdrachtDetails(this.value)
});

// EINDE TONEN EN VERBERGEN KOLOMMEN

// BEGIN GEKOPPELDE LEEREENHEDEN EN OPDRACHT DETAILS

// Functie die met behulp van ajax de gekoppelde leereenheden van de aangeklkte opdracht ophaald
function selectOpdracht(str) {
    if (str == "") {
        // De div waar de data in moet worden getoond
        document.getElementById("gekoppeldeleereenheden").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Wanneer alles klaar is de data in de div tonen
                document.getElementById("gekoppeldeleereenheden").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getopdrachtleereenheden.php?q="+str,true);
        xmlhttp.send();
    }
}

// Functie die door middel van ajax de opdracht details van de aangeklikte opdracht ophaald
function selectOpdrachtDetails(str) {
    if (str == "") {
        // De div waar de data in moet worden getoond
        document.getElementById("opdrachtdetails").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Wanneer alles klaar is de data in de div tonen
                document.getElementById("opdrachtdetails").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getopdrachtdetails.php?q="+str,true);
        xmlhttp.send();
    }
}

// EINDE GEKOPPELDE LEEREENHEDEN EN OPDRACHT DETAILS

// BEGIN POPUP OPDRACHT TOEVOEGEN

// Haal de modal op
var modal = document.getElementById("opdrachttoevoegenmodal");

// Haal de knop voor het openen van de popup op
var btn = document.getElementById("myBtn");

// Haal de knop voor annuleren op
var annuleer = document.getElementById("annuleer");

// Haal het <span> element voor het sluiten van de popup op
var span = document.getElementsByClassName("close")[0];

// Open de popup als er op de knop word geklikt
btn.onclick = function() {
    modal.style.display = "block";
}

// Sluit de popup als er op (x) word geklikt
span.onclick = function() {
    modal.style.display = "none";
}

// Sluit de popup als er op annuleren word geklikt
annuleer.onclick = function() {
    modal.style.display = "none";
}

// Sluit de popup wanneer er buiten word geklikt
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Check wat voor type opdracht gekozen is
function typeSelectCheck(nameSelect)
{
    // Als het type "individueel" is gekozen de radio buttons verborgen houden
    // en de opdracht link op 48% width houden.
    if(nameSelect){
        admOptionValue = document.getElementById("individueeltype").value;
        if(admOptionValue == nameSelect.value){
            document.getElementById("indiviudeelofgroepsopdrachtdiv").style.display = "none";
            document.getElementById("opdrachtuploadendiv").style.width = "48%";
        }
        // Als een andere optie is gekozen (intern of extern), de radio buttons tonen voor het 
        // selecteren of de opdracht individueel of in een groep word gedaan,
        // de opdracht link width verhogen naar 100%.
        else{
          document.getElementById("indiviudeelofgroepsopdrachtdiv").style.display = "block";
          document.getElementById("opdrachtuploadendiv").style.width = "100%";
        }
    }
}

// Knoppen voor het verplaatsen van leereenheden tussen multi selects -->
$().ready(function() {  
 $('#add').click(function() {  
  return !$('#select1 option:selected').remove().appendTo('#select2');  
 });  
 $('#remove').click(function() {  
  return !$('#select2 option:selected').remove().appendTo('#select1');  
 });  
}); 

// Laat aantal karakters zien die nog beschikbaar zijn voor de beschrijving
$(document).ready(function() {
    var text_max = 500;
    $('#charactercount').html(text_max + ' karakter(s) beschikbaar');

    $('#beschrijving').keyup(function() {
        var text_length = $('#beschrijving').val().length;
        var text_remaining = text_max - text_length;

        $('#charactercount').html(text_remaining + ' karakter(s) beschikbaar');
    });
});

// EINDE OPDRACHT TOEVOEGEN POPUP

// BEGIN UITNODIGEN POPUP

var uitnodigenmodal = document.getElementById("opdrachtuitnodigenmodal");

// Haal de knop voor het openen van de popup op
var uitnodigenbutton = document.getElementById("uitnodigen");

// Haal de knop voor annuleren op
var uitnodigenannuleer = document.getElementById("uitnodigenannuleer");

// Haal het <span> element voor het sluiten van de popup op
var uitnodigenspan = document.getElementsByClassName("close")[1];

// Open de popup als er op de knop word geklikt
uitnodigenbutton.onclick = function() {
    uitnodigenmodal.style.display = "block";
}

// Sluit de popup als er op (x) word geklikt
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

// Check wat voor type opdracht gekozen is
function typepersoonSelectCheck(nameSelect)
{
    // Als er voor persooon is gekozen, de optie "Beoordeling" weglaten
    if(nameSelect){
        admOptionValue = document.getElementById("uitnodigen_student").value;
        if(admOptionValue == nameSelect.value){
            document.getElementById("uitnodigen_feedback").style.display = "block";
             document.getElementById("uitnodigen_beoordeling").style.display = "none";
              document.getElementById("uitnodigen_groepsopdracht").style.display = "block";

              // to select the first visible option
$('uitnodigen_student').first().attr('selected', 'selected');
        }
        // Als een andere optie is gekozen (docent), de optie groepsopdracht weglaten
        else{
                  document.getElementById("uitnodigen_feedback").style.display = "block";
             document.getElementById("uitnodigen_beoordeling").style.display = "block";
              document.getElementById("uitnodigen_groepsopdracht").style.display = "none";

              // to select the first visible option
$('uitnodigen_student').first().attr('selected', 'selected');
        }
    }
}

// EINDE UITNODIGEN POPUP 

// BEGIN REFLECTEREN POPUP

var reflecterenmodal = document.getElementById("opdrachtreflecterenmodal");

// Haal de knop voor het openen van de popup op
var reflecterenbutton = document.getElementById("reflecteren");

// Haal de knop voor annuleren op
var reflecterenannuleer = document.getElementById("reflectieannuleer");

// Haal het <span> element voor het sluiten van de popup op
var reflecterenspan = document.getElementsByClassName("close")[2];

// Open de popup als er op de knop word geklikt
reflecterenbutton.onclick = function() {
    reflecterenmodal.style.display = "block";
}

// Sluit de popup als er op (x) word geklikt
reflecterenspan.onclick = function() {
    reflecterenmodal.style.display = "none";
}

// Sluit de popup als er op annuleren word geklikt
reflecterenannuleer.onclick = function() {
    reflecterenmodal.style.display = "none";
}

// Sluit de popup wanneer er buiten word geklikt
window.onclick = function(klikbuitenreflecteren) {
    if (klikbuitenreflecteren.target == reflecterenmodal) {
        reflecterenmodal.style.display = "none";
    }
}

// EINDE REFLECTEREN POPUP 