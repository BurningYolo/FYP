<?php
session_start(); 
if(isset($_SESSION['session']))
{
    $id=$_SESSION['session']; 
}
include("head.php"); 


$product_id=$_GET['search_result']; 
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





?> 

<style>
body{
    background-color: #B0BEC5;
}

img {
  max-width: 100%; }
  
.login_success
{
    
        background-color: green;
        color: white;
        width: 100%;
        height: auto;
        text-align: center;
        position: absolute;
        z-index: 2;

        

}

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 10px;
  background: white;
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #07db2e; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: green;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #322d26;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }



@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

/*# sourceMappingURL=style.css.map */


    </style>
    <?php
    $sql1="SELECT * FROM product_images where product_id=$product_id ";
    $result1=(mysqli_query($conn,$sql1));
    $i=1; 
?>
<?php
if(isset($_GET['product_listed']))
{
    ?>
    <div class="login_success" id="login_success">
    <p>Product has been listed </p>

</div>
    <?php
    unset($_GET['product_listed']); 
}


if(isset($_GET['update_done']))
{
    ?>
    <div class="login_success" id="login_success">
    <p>Product has been updated </p>

</div>
    <?php
    unset($_GET['update_done']); 
}
if(isset($_GET['update_error']))
{
    ?>
    <div class="login_success" id="verification_error">
    <p>Error Updating Proudct </p>

</div>
    <?php
    unset($_GET['update_error']); 
}

?>



		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-7" style="height:700px; border:4px dashed green; padding:0%">
                    <div class="preview-pic tab-content" style="border:  1px solid green";">
                        <?php
                    while($row1 = mysqli_fetch_array($result1))
                {
                    $image=$row1['image']; 
                    if($i==1)
                    {
                        ?>
                        <div class="tab-pane active" id="pic-<?php echo $i ?>"><img style="height:700px;"src="<?php echo $image ?>" /></div>
                        <?php

                    }
                    else 
                    {
                        ?>
                        <div class="tab-pane" id="pic-<?php echo $i ?>"><img style="height:700px; width:100%" src="<?php echo $image ?>" /></div>
                        <?php

                    }
                    $i++; 
    
                
                }

            ?>

						 
						
						  
						  
						</div>
                        <ul class="preview-thumbnail nav nav-tabs">
                        <?php 
                         $sql2="SELECT * FROM product_images where product_id=$product_id ";
                         $result2=(mysqli_query($conn,$sql2));
                         $i=1; 

                        ?>

                        <?php 
                                            while($row2 = mysqli_fetch_array($result2))
                                            {
                                                $image=$row2['image']; 
                                                if($i==1)
                                                {
                                                    ?>
                                                    <li class="active"><a data-target="#pic-<?php echo $i ?>" data-toggle="tab"><img style="height: 100px; width:140px" alt="1" src="<?php echo $image ?>" /></a></li>
                                                    <?php
                            
                                                }
                                                else 
                                                {
                                                    ?>
                                                     <li><a data-target="#pic-<?php echo $i ?>" data-toggle="tab"><img style="height: 100px; width:140px" alt="1" src="<?php echo $image ?>" /></a></li>
                                                    <?php
                            
                                                }
                                                $i++; 
                                
                                            
                                            }
                            
                                        ?>

                       
						</ul>
						
					</div>
					<div class="details col-md-5">
						<center><h2 class="product-title" style="color: rgb(42, 77, 42);"><?php echo $product_name?></h2></center>
						<h3 style="background-color: rgb(92, 220, 92); color:white; ">Description</h3>
						<p class="product-description"><?php echo $product_description ?> </p>
						
                        <hr>
                        <h3 style="background-color: rgb(92, 220, 92); color:white; ">Location</h3>
						
                        <h6><strong>Location:</strong> &nbsp;<?php echo $product_location?></h6>
                        <h6><strong>Address:</strong> &nbsp;<?php echo $product_address ?></h6>
                        <hr>
                       
                            <h3 style="background-color: rgb(92, 220, 92); color:white; ">Information</h3>
                            <?php 
                             $sql3="SELECT * FROM product_additional_info where product_id=$product_id ";
                             $result3=(mysqli_query($conn,$sql3));
                             while($row3 = mysqli_fetch_array($result3))
                             {
                                $heading=$row3['heading']; 
                                $detail=$row3['details']; 

                            ?>
                            <h6><strong><?php echo $heading ?>: </strong> &nbsp;<?php echo $detail ?></h6>
                            <?php 
                             }
                             ?>
                            <hr>



					
						<div class="action">
                        <h4 class="price">Starting Price :  <span><?php echo $product_starting_price ?> rs</span></h4>
                            <h4  hidden style="color:red"><strong>Time Remaning: </strong><span id="product_end_time"> <?php echo $product_end_time ?></span></h4>
                            <h4   style="color:red"><strong>Time Remaning: </strong><span id="ending_timer"> <?php echo $product_end_time ?></span></h4>
                           
                           <?php 
                           if(isset($_SESSION['session']))
                           {

                            $sql4="Select * from bidding_info where product_id = '$product_id'" ; 
                            $result4 = mysqli_query($conn , $sql4) ;
                            if($result4)
                            {
                                $rows = mysqli_num_rows($result4);


                            } 
                            if($rows == 0 )
                            {

                           

                           ?>
                            <p style="font-size: 10px;"><strong>No Bids Yet!!!</strong> Be the First one to place a bid </p>
                          <?php 
                          }
                          else if($rows > 0)
                          {
                            ?>
                            <p style="font-size: 10px;"><strong><?php echo $rows ?></strong> Bids have been placed on this product </p>
<?php

                          }

                          ?>


							<button class="add-to-cart btn btn-default" data-toggle="modal" data-target="#place_bid_amount" type="button" >Place Bid</button>
              <?php 
                           }

                            ?>
                            <hr>
                            <?php 
                            $sql4= "SELECT * from user_info where id=$product_user_id";
                            $result4=(mysqli_query($conn,$sql4));
                            while($row4 = mysqli_fetch_array($result4))
                            {
                                $user_name=$row4['name']; 
                                $user_image=$row4['image'];
                                

                            }
                        
                           


                            ?>
                            <a href="something.php?to=<?php echo $product_user_id ?>"><p>Posted by : <?php echo $user_name ?> <img width="40" height="40" class="rounded-circle" src="<?php echo $user_image ?>"></p></a>
						</div>
					</div>
				</div>
			</div>
		</div>


        <div id="place_bid_amount" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
  <center><h4 class="modal-title">Please Place Your Bid</h4></center>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
   </div>
   <div class="modal-body">
<center><div id="id_error" hidden style="width: 100% ; height:auto ; background-color:red ; color:white">You Cannot Place Bid on your own product </div></center>

      <form action="php_backend_stuff/backend.php?func=place_bid " method="POST" onsubmit="return place_bid_validation(<?php echo $product_starting_price ?>)" >
        <input type="text" value="<?php echo $product_id ?>" hidden  id="product_id" name="product_id">
        <input type="text" value="<?php echo $product_user_id ?>" hidden id="product_user_id" name="product_user_id">
        <input type="text" value="<?php echo $id ?>" hidden name="user_id" id="user_id">
        <input type="text" value="<?php echo $product_starting_price ?>" hidden id="starting_price" name="starting_price">


        

       <div class="col-md-12 p-4"><label class="labels">Enter the Amount you want to bid</label><span hidden style="color:red" id="bid_amount_error">I(nvalid Bid Amount) </span><input type="number" min-value="1" class="form-control" name="bid_amount" id="bid_amount" placeholder="Please Enter Bid Amount" required ></input></div>
       <div class="col-md-12 p-2"><label class="labels">Please Select Your Payment method</label></div>
       <div class="col-md-12 p-2"><input type="checkbox" id="credit_card1" name="credit_card1" value="1">Credit card</div>
       <div class="col-md-12 p-2"><input type="checkbox" id="paypal1" name="paypal1" value="1">Paypal</div>
       <div class="col-md-12 p-2"><input type="checkbox" id="bank1" name="bank1" value="1">Bank Payment</div>
       <center><input class="btn btn-success"type="submit"></center>
       
       </form>
   </div>
  
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>














































































































































































    <div id="bid_modal"  class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">

  <center><h4 id="NAME" class="modal-title">Payment Module</h4></center>  
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>



   <div class="modal-body">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card p-3">
                    <p class="mb-0 fw-bold h4">Payment Methods</p>
                </div>
            </div>
            <div class="col-4 "><center><button style="width: 100%;" class="btn-primary"value="" onclick="show_credit_card()"> Credit Card</center></button></div>
            <div class="col-4 justify-content-center"><center><button style="width: 100%;" class="btn-primary" value="" onclick="show_paypal()"> Paypal</center></button></center></div>
            <div class="col-4 justify-content-center"><center><button style="width: 100%;" class="btn-primary" value="" onclick="show_bank()"> By Bank</center></button></center></div>
            <div class="col-12" id="credit_card_form" hidden>
                <div class="card p-3">
                    <div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                aria-controls="collapseExample">
                                <span class="fw-bold">Credit Card</span>
                            </a>
                        </p>
                                <div class="col-lg-12">
                                    <form action="" class="form">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form__div">
                                                    <input type="text" class="form-control" placeholder=" ">
                                                    <label for="" class="form__label">Card Number</label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form__div">
                                                    <input type="text" class="form-control" placeholder=" ">
                                                    <label for="" class="form__label">MM / yy</label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form__div">
                                                    <input type="password" class="form-control" placeholder=" ">
                                                    <label for="" class="form__label">cvv code</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form__div">
                                                    <input type="text" class="form-control" placeholder=" ">
                                                    <label for="" class="form__label">name on the card</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                               <center><div class="btn btn-primary w-100">Sumbit</div></center> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-12" id="paypal_form" hidden>
                <div class="card p-3">
                    <div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                aria-controls="collapseExample">
                                <span class="fw-bold">Paypal</span>
                            </a>
                        </p>
                                <div class="col-lg-12">
                                <script src="https://www.paypal.com/sdk/js?client-id=AZyyE_EI5umDuTZDf70WTutEiV2EdlYAM-D3QbA8R_n5fD3snXplqS4WSDw70_b1x69HqegCFiiyfC0E"></script>
                                <div id="paypal-button-container"></div>
                                <script>
                               paypal.Buttons({
  createOrder: function(data, actions) {
    // This function sets up the details of the transaction, including the amount and line item details.
    return actions.order.create({
      purchase_units: [{
        amount: {
          value: '<?php echo $product_starting_price ?>'
        }
      }]
    });
  }
}).render('#paypal-button-container');
//This function displays payment buttons on your web page.
                                </script>
                            
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-12" id="bank_form" hidden>
                <div class="card p-3">
                    <div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                aria-controls="collapseExample">
                                <span class="fw-bold">Manual Bank Payment</span>
                            </a>
                        </p>
                                <div class="col-lg-12">
                                    <form action="" class="form">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form__div">
                                                    <input type="text" class="form-control" placeholder=" ">
                                                    <label for="" class="form__label">Card Number</label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form__div">
                                                    <input type="text" class="form-control" placeholder=" ">
                                                    <label for="" class="form__label">MM / yy</label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form__div">
                                                    <input type="password" class="form-control" placeholder=" ">
                                                    <label for="" class="form__label">cvv code</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form__div">
                                                    <input type="text" class="form-control" placeholder=" ">
                                                    <label for="" class="form__label">name on the card</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                               <center><div class="btn btn-primary w-100">Sumbit</div></center> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
















                </div>
            </div>
        </div>


 
   
  
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
</div>













        <script>
          
            const span = document.getElementById('product_end_time');

    
            const text1 = span.textContent;
            console.log(text1);

            var countDownDate = new Date(text1).getTime();

// Update the count down every 1 second
    var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("ending_timer").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("ending_timer").innerHTML = "EXPIRED";
  }
}, 1000);

            
            </script>

