var voornaam = document.getElementById('voornaam');
var achternaam = document.getElementById('achternaam');
var huisnummer = document.getElementById('huisnummer');
var postcode = document.getElementById('postcode');
var straat = document.getElementById('straat');
var stad = document.getElementById('stad');
var btlmethode = document.getElementById('btlmethode');
var bestel_knop = document.getElementById('bestel-knop');
var form = document.getElementById('form')

if ( form != null) {
    form.addEventListener('submit', function (event) {

        if ((voornaam.value != "") &&
            (achternaam.value != "") &&
            (straat.value != "") &&
            (huisnummer.value != "") &&
            (postcode.value != "") &&
            (stad.value != "") &&
            (btlmethode.value != "")) {

            document.getElementById('melding').style = 'display:flex; color:green; border:solid green;';
            document.getElementById('melding').innerHTML = 'Bedankt voor uw bestelling!'


        } else {
            event.preventDefault();
            document.getElementById('melding').style = 'display:flex; color:red; border:solid red;';
            document.getElementById('melding').innerHTML = 'Alles met een ster moet ingevuld zijn!'
        }
    })

}


// console.log('hallo')