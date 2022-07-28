<?php
session_start(); 
if(isset($_SESSION['session']))
{
    $id=$_SESSION['session']; 
}
include("head.php"); 

$sql="select * from product_info where user_id = '$id' "; 
$result=(mysqli_query($conn,$sql));
?>
<style>
   body{
    background-color: #B0BEC5;

}
.verification_success
{
    
        background-color: green;
        color: white;
        width: 100%;
        height: auto;
        text-align: center;
        position: absolute;

        

}
.verification_error
{
    
        background-color: red;
        color: white;
        width: 100%;
        height: auto;
        text-align: center;
        position: absolute;

        

}
</style>
<?php 
if(isset($_GET['verification_done']))
{
?>
<div class="verification_success" id="verification_success">
    <p>Documents Successfully sent for Verification</p>

</div>
<?php 
unset($_GET['verification_done']); 
}
?>
<?php 
if(isset($_GET['verification_error']))
{
?>
<div class="verification_error" id="verification_error">
    <p>Error Submiting Documents</p>

</div>
<?php 
unset($_GET['verification_error']); 
}
?>

<div class="container mt-5 mb-5 ">
<div class="d-flex justify-content-center row ">
<div class="col-md-10">
            <div class="row p-2 justify-content-center bg-white border rounded" >
              <h2>PRODUCTS</h2>
            </div>

</div>

     
    
</div>
<?php
while($row = mysqli_fetch_array($result))
{
$product_name = $row['name']; 
$product_address = $row['address']; 
$product_location = $row['location']; 
$product_description = $row['description']; 
$product_starting_price = $row['start_price']; 
$product_goal_price = $row['goal_price']; 
$product_id = $row['id']; 


?>

            <?php
$sql1="Select * from product_images where product_id = '$product_id' Limit 1"; 
$result1=(mysqli_query($conn,$sql1));
while($row1 = mysqli_fetch_array($result1))
{
    $product_image = $row1['image']; 
}
?>



<form action="product_page.php?search_result=<?php echo $product_id ?>" method="POST">
<div class="d-flex justify-content-center row" >
    <div class="col-md-10">
        <div class="row p-2 bg-white border rounded" >
            <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" style="height: 159px; width:200px"  src="<?php echo $product_image ?>"></div>
            <div class="col-md-6 mt-1">
                <h5><?php echo $product_name ?></h5>
                <div class="d-flex flex-row">
                 <span><?php echo $product_description ?></span>
                </div>
                <br>
                <div class="mt-1 mb-1 spec-1"><span><?php echo $product_location?></span><span class="dot"></span></div>
                <div class="mt-1 mb-1 spec-1"><span><?php echo $product_address ?></span><span class="dot"></span></div>                   
                 
            </div>
            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                <div class="d-flex flex-row align-items-center">
                    <h4 class="mr-1" style="color: green;"><?php echo $product_starting_price ?>rs</h4>
                </div>
                <h6 class="text-success">Bid now </h6>
                <div class="d-flex flex-column mt-4"><button class="btn btn-success btn-sm" type="submit">Details</button>
                
            </div>
            <div class="d-flex flex-column mt-4"><button class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#verify_product<?php echo $product_id ?>" type="button">Verify Product</button>
                
                </div>
                <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" type="button"><a style="color: white; " href="update_product.php?product=<?php echo $product_id ?>"> Update Info  </a></button>
                
                </div>
        </div>
    
    </div>
</div>
</div>
</form>


<div id="verify_product<?php echo $product_id ?>" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
  <center><h4 class="modal-title">PRODUCT INFO</h4></center>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
   </div>
   <div class="modal-body">

      <form action="php_backend_stuff/backend.php?func=product_verification" method="POST" enctype="multipart/form-data">
        <input type="text" value="<?php echo $product_id ?>" hidden name="product_id">

       <div class="col-md-12"><label class="labels">Description</label><textarea type="text" class="form-control" name="description" id="description" placeholder="Please give information about the documents" required ></textarea></div>

       <div class="col-md-12 p-4"><center><input style="width:90%  ; color: black; cursor: pointer;" id="product_image" class="form-control"   name="upload[]" type="file" accept="image/png, image/gif, image/jpeg" multiple  required > </center> </div>
       <center><input class="btn btn-success"type="submit"></center>
       
       </form>



   


   </div>
  
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>



<?php 

}
?>
