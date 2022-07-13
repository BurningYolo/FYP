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
   
   <form id="product_registration_form" method="POST" enctype="multipart/form-data" onsubmit="return(product_register_validation())">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column  p-3 py-5">
            <div class="d-flex justify-content-between  mb-3">
                    <h4  style="color: green;"class="text-left">Basic Information</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Name<span id="name_error"></span></label><input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"  required ></div>
                    <div class="col-md-12"><label class="labels">Category<span id="category_error"></span></label><select type="text" class="form-control" name="category" id="category" placeholder=" Choose Category" required  >
                        <option disabled selected value="base"> Select a category</option>
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
                    <div class="col-md-12"><label class="labels">Location<span id="location_error"></span></label><input type="text" class="form-control" name="location" id="location" placeholder=" Enter Location " required  ></div>       
                    <div class="col-md-12"><label class="labels">Address<span id="address_error"></span></label><input type="text" class="form-control" name="address" id="address" placeholder=" Enter Address "  required ></div>       
                </div>

            </div>
        </div>
           <div class="col-md-4 border-right" >
            <div class="d-flex flex-column  p-3 py-5" id="additional_feilds">
            <div class="d-flex justify-content-between  mb-3">
                    <h4  style="color: green;"class="text-left">Additional Information</h4>
                </div>
                <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Description<span id="description_error"></span></label><textarea rows="5" type="text" class="form-control" id="description" name="description" placeholder="Description" value="" required></textarea></div>

                <br>
                <br>
                <div class="col-md-12 p-4"><button class="form-control" id="additional_options_button" onclick="add_more_labels()">Add more Labels +</button></div>
              
               
                </div>

            </div>
        </div>
        <div class="col-md-4 ">
            <div class="d-flex flex-column  p-3 py-5">
            <div class="d-flex justify-content-between  mb-3">
                    <h4  style="color: green;"class="text-left">Pricing Information </h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Starting Price<span id="starting_price_error"></span></label><input type="number" class="form-control" name="starting_price" id="starting_price" placeholder="Enter Starting Price"   required></div>
                    <div class="col-md-12"><label class="labels">Goal Price<span id="goal_price_error"></span></label><input type="number" class="form-control" name="goal_price" id="goal_price" placeholder="Enter Goal Price"  required  ></div>
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

    <div class="col-md-12 p-4"><center><input style="width:90% ; background-color:rgb(173, 206, 173) ; color: black; cursor: pointer;" id="product_image" class="form-control"  name="product_image[]" type="file" accept="image/png, image/gif, image/jpeg" multiple  required > </center> </div>
  
   <center> <div class="col-md-12 "><input type="submit" value="Register Product"></div> </center>

    </div>
    <div class="col-md-4 ">
    </div>
        
    </div>
</div>
</form>