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



var counter =1 ; 
function add_more_labels()
{

    if(counter >= 5)
    {
        var button = document.getElementById("additional_options_button"); 
        button.innerHTML = "Limit Reached";
        button.style.backgroundColor="red"; 
        button.style.color="white"; 

        console.log("no"); 
        
        return; 
    }
    let heading = prompt("Please Enter the name of Label");
let text;
if (heading == null || heading == "") {
    console.log("nothing entered")


} else {
    
    console.log(heading); 
    console.log(counter)

    html='  <div class="col-md-12"><label class="labels">'+heading+'</label><input type="text" class="form-control" name="detail'+counter+'" id="detail'+counter+'" placeholder=" Enter '+heading+' " required><input type="text" class="form-control" name="heading'+counter+'" id="heading'+counter+'" value="'+heading+'" hidden " ></div>         '
    var form=document.getElementById("additional_feilds"); 
    form.innerHTML+=html
    counter++
}

}



