var searchInput = 'location';
 
$(document).ready(function () {
 var autocomplete;
 autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
  types: ['geocode'],
  /*componentRestrictions: {
   country: "USA"
  }*/
 });
  
 google.maps.event.addListener(autocomplete, 'place_changed', function () {
  var near_place = autocomplete.getPlace();
 });
});


function show_credit_card()
{
    document.getElementById("credit_card_form").hidden=false; 
    document.getElementById("paypal_form").hidden=true; 
    document.getElementById("bank_form").hidden=true; 
    
}

function show_paypal()
{
    document.getElementById("credit_card_form").hidden=true; 
    document.getElementById("paypal_form").hidden=false; 
    document.getElementById("bank_form").hidden=true; 
    
}

function show_bank()
{
    document.getElementById("credit_card_form").hidden=true; 
    document.getElementById("paypal_form").hidden=true; 
    document.getElementById("bank_form").hidden=false; 
    
}






