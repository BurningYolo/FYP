<?php
session_start(); 
if(isset($_SESSION['session']))
{
    $id=$_SESSION['session']; 
}
include("head.php"); 
?>
<style>


.login_success
{
    
        background-color: green;
        color: white;
        width: 100%;
        height: auto;
        text-align: center;
        position: absolute;

        

}
</style>
<?php
if(isset($_GET['login_success']))
{
    ?>
    <div class="login_success" id="login_success">
    <p>Logged In</p>

</div>
    <?php
    unset($_GET['login_sucess']); 
}


?>
<div class="container">
<header class="w3-container w3-green w3-center" style="padding:128px 16px ; ">
  <h1 class="w3-margin w3-jumbo">EasyAuction</h1>
  <p class="w3-xlarge">Auction your Property </p>
  <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top " onclick="smooth_scroll()">Get Started</button>
</header>

</div>


<?php

$sql = "Select * from product_info order by id ASC Limit 4 " ; 
$result = mysqli_query($conn , $sql ) ; 





?>
    <section class="collection" id="something">
      <div class="container py-5">
        <h1 class="text-center">NEW LISTINGS </h1>
        <div class="row py-5">
            <?php 
while($row=mysqli_fetch_array($result))

{
    $product = $row['id'] ; 
    $sql1 = "Select * from product_images where product_id = '$product' limit 1";
    $result1 = mysqli_query($conn , $sql1 ) ; 
    while($row1=mysqli_fetch_array($result1))
    {
        $image = $row1['image'];
    }


            ?>
            <div class="col-lg-3">
              <div class="card">
                <img src="<?php echo $image ?>" style="height:450px" class="img-fluid mb-3" alt="">
                <a href="product_page.php?search_result=<?php echo $product ?>"><input type="button" class="btn btn-success" value="Show Details"></a>
                <b><h5><?php echo $row['name'] ?></h5></b>
                <p><small>Starting from:<span> <?php echo $row['start_price'] ?> </span></small></p>
              </div>
            </div>
    

    <?php }
    ?>
    
    </div>
      </div>
    </section>

    <?php

$sql = "Select * from product_info order by id DESC Limit 4 " ; 
$result = mysqli_query($conn , $sql ) ; 





?>
    <section class="collection" >
      <div class="container py-5">
        <h1 class="text-center">TRENDING </h1>
        <div class="row py-5">
            <?php 
while($row=mysqli_fetch_array($result))

{
    $product = $row['id'] ; 
    $sql1 = "Select * from product_images where product_id = '$product' limit 1";
    $result1 = mysqli_query($conn , $sql1 ) ; 
    while($row1=mysqli_fetch_array($result1))
    {
        $image = $row1['image'];
    }


            ?>
            <div class="col-lg-3">
              <div class="card">
                <img src="<?php echo $image ?>" style="height:450px" class="img-fluid mb-3" alt="">
                <a href="product_page.php?search_result=<?php echo $product ?>"><input type="button" class="btn btn-success" value="Show Details"></a>
                <b><h5><?php echo $row['name'] ?></h5></b>
                <p><small>Starting from:<span> <?php echo $row['start_price'] ?> </span></small></p>
              </div>
            </div>
    

    <?php }
    ?>
    
    </div>
      </div>
    </section>
    
    </section>
   
   <script>
    function smooth_scroll()
    {
        var element = document.getElementById("something");

        element.scrollIntoView({behavior: "smooth"});
    }
   </script>