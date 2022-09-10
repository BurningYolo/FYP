<?php 
 include("loader.php") ; 
session_start(); 
include("head.php");
if(!isset($_SESSION['session']))
{
    echo "<script> location.href='/from_scratch/login.php?need_login=1'; </script>";

}
$product_id = $_GET['product']; 
$sql="SELECT * from product_info WHERE id=$product_id";

$result=(mysqli_query($conn, $sql));

if ($result->num_rows>0 ){
    while ($row = $result->fetch_object()) {    
        $product_name= $row->name;  
        $product_address=$row->address; 
        $product_location=$row->location; 
        $product_approval=$row->approval; 
        $product_description=$row->description; 
        $product_starting_price=$row->start_price; 
        $product_goal_price=$row->goal_price; 
        $product_end_time=$row->end_time; 
        $product_category_id=$row->product_category_id; 
        $product_user_id=$row->user_id; 


    }

}
$sql = "SELECT * from product_category where id = '$product_category_id'"; 
$result =(mysqli_query($conn,$sql));
if ($result->num_rows>0 ){
    while ($row = $result->fetch_object()) {    
        $category_name= $row->category;  
    }
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
     <b><h2 style="color: green; "class="text-center">Update Your Product Your Product</h2></b>
    </div>
   
   <form id="" method="POST" action="php_backend_stuff/backend.php?func=update_product" " onsubmit="return(product_update_validation())">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column  p-3 py-5">
            <div class="d-flex justify-content-between  mb-3">
                    <h4  style="color: green;"class="text-left">Basic Information</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Name<span id="name_error"></span></label><input type="text" class="form-control" name="name" value="<?php echo $product_name ?>" id="name" placeholder="Enter Name" maxlength = "20" required ></div>
                    <div class="col-md-12"><label class="labels">Category<span id="category_error"></span></label><select type="text" class="form-control" name="category" maxlength = "10" id="register_category" placeholder=" Choose Category" required  >
                        <option disabled selected value="<?php echo $product_category_id ?>"> <?php echo $category_name ?></option>
                    </select></div>
                    <div class="col-md-12"><label class="labels">Location<span id="location_error"></span></label><input type="text" maxlength = "40" value = "<?php echo $product_location ?>" class="form-control" name="location" id="location" placeholder=" Enter Location " required  ></div>       
                    
                    <div class="col-md-12"><label class="labels">Address<span id="address_error"></span></label><input type="text"  maxlength = "40" value = "<?php echo $product_address ?> "class="form-control" name="address" id="address" placeholder=" Enter Address "  required ></div>       
                    <div class="col-md-12 labels"><label>Description<span id="description_error"></span></label><textarea rows="5" type="text" maxlength = "200" class="form-control"  value="<?php echo $product_description ?>" id="description" name="description" placeholder="Description"  required><?php echo $product_description ?></textarea></div>

                </div>

            </div>
        </div>
           <div class="col-md-4 border-right" >
            <div class="d-flex flex-column  p-3 py-5" >
            <div class="d-flex justify-content-between  mb-3">
                    <h4  style="color: green;"class="text-left">Additional Information</h4>
                </div>
                <div class="row mt-3" id="additional_fields">
                  
                    <?php 
                      $i = 0; 
                    $sql = "SELECT * from product_additional_info where product_id = '$product_id' "; 
                    $result= (mysqli_query($conn, $sql)); 
                    while($row = mysqli_fetch_array($result))
                    {
                        ?> <div class="col-md-12"><label class="labels"><?php echo $row['heading'] ?></label><input type="text"  value ="<?php echo $row['details'] ?>" class="form-control" name="detail<?php echo $i ?>"  ></div>       

<?php
$i++ ; 
                    }


?>
                    

              
               
                
            </div>

            </div>
        </div>
        <div class="col-md-4 ">
            <div class="d-flex flex-column  p-3 py-5">
            <div class="d-flex justify-content-between  mb-3">
                    <h4  style="color: green;"class="text-left">Pricing Information </h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Starting Price<span id="starting_price_error"></span></label><input type="number" min="1" max="100000000" class="form-control" name="starting_price" value="<?php echo $product_starting_price ?>" id="starting_price" placeholder="Enter Starting Price"   required></div>
                    <div class="col-md-12"><label class="labels">Goal Price<span id="goal_price_error"></span></label><input type="number"   min="1" max="100000000000" class="form-control"  name="goal_price" value="<?php echo $product_goal_price ?>" id="goal_price" placeholder="Enter Goal Price"  required  ></div>
                    <div class="col-md-12"><label class="labels">Ending Time <span id="ending_time_error"></span></label><input type="date"  name="ending_time" class="form-control" id="ending_time" value="<?php echo $product_end_time ?>"    placeholder="Enter Ending Time"  disabled  required ></div>
                    <input type="hidden" value="<?php echo $i ?>" name="i" >
                    <input type="hidden" value="<?php echo $product_id ?>" name="product_id" >
                    <input type="hidden" value="<?php echo $id ?>" name="id" ?>
                    <input type="hidden" value="<?php echo $product_user_id ?>" name="product_user_id" >
                </div>

            </div>
        </div>
        
    </div>
    <div class="row justify-content-center border-top p-1 py-2">
    <div class="col-md-4 ">
    </div>
    <div class="col-md-4 ">  
   <center> <div class="col-md-12 "><input class = 'btn-success btn'type="submit" value="Update Information"></div> </center>

    </div>
    <div class="col-md-4 ">
    </div>
        
    </div>
</div>
</form>