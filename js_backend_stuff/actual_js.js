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
function notification_see(id)
{
    console.log(id)
    $.ajax({
        url:'php_backend_stuff/backend.php',
        type:"POST", 
        data:{
         id:id,
         ajax_func:"notification"
        }, 
        success:function(result)
        {
            document.getElementById("notification-check").innerHTML=' '; 
            document.getElementById("notification-check").innerHTML='<p class="dropdown-item">No New Notifications</p>'; 
           
        }
      
      
      })

}

function choosewinner(id){
    var id = id ;
    var date = todays_date_formatting(); 
    $.ajax({
        url:'php_backend_stuff/backend.php',
        type:"POST", 
        data:{
         id:id,
         date:date,
         ajax_func:"winner"
        }, 
        success:function(result)
        {
            console.log(result) 

            // email to winner 
           
        }
      
      
      })

    

}

$(document).ready( function () {
    $('#user_table').DataTable(
    );
} );









