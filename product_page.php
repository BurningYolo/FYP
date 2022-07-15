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
    <p>Product Listed Successfully</p>

</div>
    <?php
    unset($_GET['product_listed']); 
}

?>



		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-7    ">
                    <div class="preview-pic tab-content">
                        <?php
                    while($row1 = mysqli_fetch_array($result1))
                {
                    $image=$row1['image']; 
                    if($i==1)
                    {
                        ?>
                        <div class="tab-pane active" id="pic-<?php echo $i ?>"><img src="<?php echo $image ?>" /></div>
                        <?php

                    }
                    else 
                    {
                        ?>
                        <div class="tab-pane" id="pic-<?php echo $i ?>"><img src="<?php echo $image ?>" /></div>
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
                                                    <li class="active"><a data-target="#pic-<?php echo $i ?>" data-toggle="tab"><img alt="1" src="<?php echo $image ?>" /></a></li>
                                                    <?php
                            
                                                }
                                                else 
                                                {
                                                    ?>
                                                     <li><a data-target="#pic-<?php echo $i ?>" data-toggle="tab"><img alt="1" src="<?php echo $image ?>" /></a></li>
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
                                $detail=$row3['detail']; 

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
                            <p style="font-size: 10px;"><strong>No Bids Yet!!!</strong> Bet the First one to place a bid </p>
							<button class="add-to-cart btn btn-default" type="button">Place Bid</button>
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
                            <p>Posted by : <?php echo $user_name ?> <img width="40" height="40" class="rounded-circle" src="<?php echo $user_image ?>"></p>
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

