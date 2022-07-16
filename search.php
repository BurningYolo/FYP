<?php
session_start(); 
if(isset($_SESSION['session']))
{
    $id=$_SESSION['session']; 
    
 
}

include("head.php"); 


$sql="Select * from user_info where id = '$id'"; 
$result=(mysqli_query($conn,$sql));
while($row = mysqli_fetch_array($result))
{
    $id_image = $row['image']; 
    $x = $row['name']; 
}




if(isset($_POST['search']))
{
$search =$_POST['search']; 
}
else 
{
    $search = " "; 
}

$sql="Select * from product_info where address like   '%$search%' OR location like '%$search%'"; 
$result=(mysqli_query($conn,$sql));

?>



<style>
    body{
    background-color: #B0BEC5;
}
.container1 {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}
.container1::after {
  content: "";
  clear: both;
  display: table;
}

/* Style images */
.container1 img {
  float: left;
  height: 60px;
  width: 120px;
  margin-right: 20px;
  border-radius: 50%;
}

/* Style the right image */

    </style>

<div class="container mt-5 mb-5">
<div class="d-flex justify-content-center row" >
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

<form action="php_backend_stuff/backend.php?func=message" method="POST">
    <div class="d-flex justify-content-center row" >
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded" >
                <?php 
                while($row3 = mysqli_fetch_array($result3))
                {
                    $user_id=$row3['id']; 
                    $user_name=$row3['name']; 
                    $user_image=$row3['image']; 
                ?>
                <div class="col-md-4 mt-1 border-right "><center><img class="img-fluid img-responsive rounded-circle product-image" style="height: 150px ; width:200px"  src="<?php echo $user_image ?>"></center>
                <center><h4><?php echo $user_name ?></h4></center>






<!-- // MODAL WOHOOOOOO END MY LIFE PLZ  -->

<?php 
$sql5= "SELECT * FROM user_chat where to_user = $id AND from_user =$user_id OR to_user=$user_id AND from_user=$id" ; 
$result5=(mysqli_query($conn,$sql5));


?>



<div id="chat_modal<?php echo $user_id ?>"  class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">

  <center><h4 id="NAME" class="modal-title">Chat</h4></center>  
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>



   <div class="modal-body">
     <input type="text" value="<?php echo $user_id ?> " name="to_id" hidden id="chat_id" >
     <input type="text" name="from_id" value="<?php echo $id ?> " hidden " >
     <?php 
    while($row5 = mysqli_fetch_array($result5))
    {
        $message=$row5['msg']; 
        $time = $row5['entry_time']; 
        $from_id = $row5['from_user']; 
        $to_id = $row5['to_user']; 

        if($from_id == $id)
        {
            ?>
    

<div class="container1 ">
  <img src="<?php echo $id_image ?>" alt="Avatar" class="right">
  <p><?php echo $message ?></p>
  <span class="time-left"><?php echo $time ?></span>
</div>
         
        
   
<?php 
        }
        else if($from_id == $user_id)
        {
        ?>
        <div class="container1 ">
    <img src="<?php echo $user_image ?>" alt="Avatar" class="left">
    <p><?php echo $message ?></p>
    <span class="time-left"><?php echo $time ?></span>
    </div>
        


<?php 
        }
    }

?>

<textarea  type="text" name="msg" id="msg" placeholder="Type your message here" style="width:100% ; height:100px"></textarea>

<input type="submit" value="Send" class="btn-success">

 
   
  
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
</div>










                
                <?php
                if($id!= $user_id)
                {
                ?>
                <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" onclick="get_user_id(this,<?php echo $user_id ?>)" data-toggle="modal" data-target="#chat_modal<?php echo $user_id ;?>" value="<?php echo $user_id ?>" id="chat_user<?php echo $user_id ?>" type="button" >Chat</button> </div>
            <?php
                }
            ?>
           
              

        
       
    </div>
    <?php 
                }
    ?>
</div>

</form>

</div>



<script>

    function get_user_id(e,id)
{
    var to_id=$('#chat_user'+ id).val();
    $('input[id="chat_id"]').val(to_id);
    console.log(to_id);
    const heading = document.getElementById('NAME');
    var from_id = <?php echo $id ?>
    
    
    $.ajax({
  url:'php_backend_stuff/backend.php',
  type:"POST", 
   data:{
   to_id:to_id,
   ajax_func:"something"
  }, 
  success:function(result)
  {
    result = JSON.parse(result);
    console.log(result.name)
    console.log(result.image)
    heading.textContent = result.name;
    $.ajax({
  url:'php_backend_stuff/backend.php',
  type:"POST", 
   data:{
   to_id:to_id,
   from_id:from_id,
   ajax_func:"get_chat"
  }, 
  success:function(result)
  {
    console.log(result)
  }
})
  }
})

    


}

    </script>




