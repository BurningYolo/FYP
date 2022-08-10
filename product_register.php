<?php 
session_start(); 
include("head.php");
if(!isset($_SESSION['session']))
{
    echo "<script> location.href='/from_scratch/login.php?need_login=1'; </script>";

}

?>
<style>


body {
    background: #B0BEC5; 
    background-image: url('images/logos&stuff/bg-1.jpg');
    background-size: 100% 100%;
}
.input_image
{
    background-color: green;
    color: white;
    border: 2px solid black;
    padding: 2px;
    cursor: pointer;
    
}
#name_error , #address_error , #category_error , #location_error , #description_error , #starting_price_error , #goal_price_error , #ending_time_error
{
    color: red;
}
#product_image
{
    width: 100%;
    height: 50px;
}

.form-control:focus {
    box-shadow: none;
    border-color: green;
}

.profile-button {
    background: green;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: silver; 
}
#additional_options_button
{
    background-color: green;
    color: white;

}

.profile-button:focus {
    background: green;
    box-shadow: none
}

.profile-button:active {
    background: green;
    box-shadow: none
}

.back:hover {
    color: green;
    cursor: pointer
}

.labels {
    font-size: 11px
}
</style>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row justify-content-center border-bottom p-1 py-2">
     <b><h2 style="color: green; "class="text-center">Register Your Product</h2></b>
    </div>
   
   <form id="product_registration_form" method="POST" action="php_backend_stuff/backend.php?func=product_register" enctype="multipart/form-data" onsubmit="return(product_register_validation())">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column  p-3 py-5">
            <div class="d-flex justify-content-between  mb-3">
                    <h4  style="color: green;"class="text-left">Basic Information</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Name<span id="name_error"></span></label><input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" maxlength = "20" required ></div>
                    <div class="col-md-12"><label class="labels">Category<span id="category_error"></span></label><select type="text" class="form-control" name="category" maxlength = "10" id="register_category" placeholder=" Choose Category" required  >
                        <option disabled selected > Select a category</option>
                        <?php 
                         $sql="SELECT * from product_category ";
                         $result=(mysqli_query($conn, $sql));
                         
                         while($row=mysqli_fetch_array($result))
                         {
         
                         ?>
                       
                         <?php
                           echo'<option value="'.$row['id'].'" >'.$row['category'].'</option>';
                         }
         
                         ?>

                    </select></div>
                    <div class="col-md-12"><label class="labels">Location<span id="location_error"></span></label><input type="text" maxlength = "40" class="form-control" name="location" id="location" placeholder=" Enter Location " required  ></div>       
                    
                    <div class="col-md-12"><label class="labels">Address<span id="address_error"></span></label><input type="text"  maxlength = "40"class="form-control" name="address" id="address" placeholder=" Enter Address "  required ></div>       
                    <div class="col-md-12 labels"><label>Description<span id="description_error"></span></label><textarea rows="5" type="text" maxlength = "200" class="form-control" id="description" name="description" placeholder="Description"  required></textarea></div>

                </div>

            </div>
        </div>
           <div class="col-md-4 border-right" >
            <div class="d-flex flex-column  p-3 py-5" >
            <div class="d-flex justify-content-between  mb-3">
                    <h4  style="color: green;"class="text-left">Additional Information</h4>
                </div>
                <div class="row mt-3" id="additional_fields">
                    

              
               
                
            </div>

            </div>
        </div>
        <div class="col-md-4 ">
            <div class="d-flex flex-column  p-3 py-5">
            <div class="d-flex justify-content-between  mb-3">
                    <h4  style="color: green;"class="text-left">Pricing Information </h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Starting Price<span id="starting_price_error"></span></label><input type="number" min="1" max="100000000" class="form-control" name="starting_price" id="starting_price" placeholder="Enter Starting Price"   required></div>
                    <div class="col-md-12"><label class="labels">Goal Price<span id="goal_price_error"></span></label><input type="number"   min="1" max="100000000" class="form-control" maxlength = "10" name="goal_price" id="goal_price" placeholder="Enter Goal Price"  required  ></div>
                    <div class="col-md-12"><label class="labels">Ending Time <span id="ending_time_error"></span></label><input type="date"  name="ending_time" class="form-control" id="ending_time"     placeholder="Enter Ending Time" required ></div>
               
                </div>

            </div>
        </div>
        
    </div>
    <div class="row justify-content-center border-top p-1 py-2">
    <div class="col-md-4 ">
    </div>
    <div class="col-md-4 ">
    <h4  style="color: green;"class="text-center">Product Pictures</h4>

    <div class="col-md-12 p-4"><center><input style="width:90% ; background-color:rgb(173, 206, 173) ; color: black; cursor: pointer;" id="product_image" class="form-control"   name="upload[]" type="file" accept="image/png, image/gif, image/jpeg" multiple  required > </center> </div>
  
   <center> <div class="col-md-12 "><input type="submit" value="Register Product"></div> </center>

    </div>
    <div class="col-md-4 ">
    </div>
        
    </div>
</div>
</form>

<script>
    $('#register_category').on('change',function(){
        document.getElementById("additional_fields").innerHTML = " ";

        
        
        var product_category_id = $('#register_category').val();
        console.log(product_category_id)
  $.ajax({
    url:'php_backend_stuff/backend.php',
    type:"POST", 
    data:{
     
     ajax_func:"product_additional_info_tags",
     product_category_id:product_category_id 


    }, 
    success:function(result)
    {
        document.getElementById("additional_fields").innerHTML = result;
        
        // var obj = JSON.parse(result);
        //     var res = [];
              
        //     for(var i in obj)
        //         res.push(obj[i]);
        //         console.log(obj[i])
        //         if(obj[i] != null)
        //         {
        //         var div = []

        //         div = document.createElement("div");
        //         FN.setAttribute("class", "col-md-12");
        //         var c = document.getElementById("additional_fields")
        //         c.appendChild("additional_fields")
        //         var FN = document.createElement("input");
        //         FN.setAttribute("type", "text");
        //         FN.setAttribute("name", "FullName");
        //         FN.setAttribute("placeholder", "Full Name");


        //         var cont = document.getElementById("div")
        //         cont.appendChild("div")

        //         }

                
       
    }
  
  
  })
  

  });

</script>