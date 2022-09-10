<?php
 include("loader.php") ; 
session_start(); 
if(isset($_SESSION['session']))
{
    $id=$_SESSION['session']; 
    
 
}

include("head.php"); 
$check = 0 ; 

?>

<style>
    body{
    background-color: #B0BEC5;

}


/* Style the right image */

    </style>
    <?php


$sql="Select * from user_info where id = '$id'"; 
$result=(mysqli_query($conn,$sql));
while($row = mysqli_fetch_array($result))
{
    $id_image = $row['image']; 
    $id_name = $row['name']; 
    $id_email=$row['email']; 
}




if(isset($_POST['search'] ) && $_POST['search'] != " ")
{
    $check = 1 ; 
$search =$_POST['search']; 

$sql="Select * from product_info where address like   '%$search%' OR location like '%$search%'"; 
$result=(mysqli_query($conn,$sql));

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
    $product_id = $row['id']; 

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
            </div>
        
        </div>
    </div>
</div>
</form>
<?php 
}
?>

<div class="d-flex justify-content-center row" >
<div class="col-md-10">
            <div class="row p-2 justify-content-center bg-white border rounded" >
              <h2>USERS</h2>
            </div>

</div>

</div>

<?php
$sql3="Select * from user_info where name like   '%$search%' "; 
$result3=(mysqli_query($conn,$sql3));


?>


    <div class="d-flex justify-content-center row" >
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded" >
                <?php 
                while($row3 = mysqli_fetch_array($result3))
                {
                    $user_id=$row3['id']; 
                    $user_name=$row3['name']; 
                    $user_image=$row3['image']; 
                    $user_email=$row3['email']; 
                ?>
                <?php 

                ?>
                <div class="col-md-4 mt-1 border-right "><center><img class="img-fluid img-responsive rounded-circle product-image" style="height: 150px ; width:200px"  src="<?php echo $user_image ?>"></center>
                <center><h4><?php echo $user_name ?></h4></center>













                
                <?php
                if($id!=$user_id)
                {
                ?>
                <div class="d-flex flex-column mt-4"><a href = "something.php?to=<?php echo $user_id ?>"><button  type="button" class="btn btn-primary btn-sm">Details</button> </a></div>
            <?php
                }
            ?>
           
              

        
       
    </div>
    <?php 
                }
            }
    ?>
</div>


</div>


<?php 
if(isset($_GET['product_category']))
{
    ?>

<div class="container mt-5 mb-5">
<div class="d-flex justify-content-center row" >
<div class="col-md-10">
            <div class="row p-2 justify-content-center bg-white border rounded" >
              <h2>PRODUCTS</h2>
            </div>

</div>

     
    
</div>
<?php
    $product_category = $_GET['product_category']; 
    $sql="Select * from product_info where product_category_id = '$product_category'"; 
    $result=(mysqli_query($conn,$sql));
    while($row = mysqli_fetch_array($result))
{
    $product_name = $row['name']; 
    $product_address = $row['address']; 
    $product_location = $row['location']; 
    $product_description = $row['description']; 
    $product_starting_price = $row['start_price']; 
    $product_id = $row['id']; 

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
            </div>
        
        </div>
    </div>
</div>
</form>



    
<?php 

}
}


?>



</div>
    </div>
</div>

    </script>






