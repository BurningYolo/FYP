<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
</script>


<?php
session_start();
if(isset($_SESSION['session'])){
    $id=$_SESSION['session']; 
 
  }
include("connection.php"); 



$func = $_GET['func'] ?? 'null';
$ajax_func= $_POST['ajax_func'] ??'null'; 

if($func=="signup")
{
    $name=$_POST['username']; 
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hashed=password_hash($password,PASSWORD_BCRYPT); 
    $role_id=4; 
    $image = "images/user_images/basic.jpg" ; 
    
$sql="SELECT email from user_info where email ='$email' ";

$result=(mysqli_query($conn, $sql)); 

if ($result->num_rows>0 ) {
    echo "<script> location.href='/from_scratch/signup.php?email_present=1'; </script>";

}
else 
{

$sql="INSERT INTO user_info (name,email,pass,role_id,image) VALUES ('$name','$email','$hashed','$role_id', '$image')";

if(mysqli_query($conn,$sql))
{
    echo "<script> location.href='/from_scratch/login.php?account_created=1'; </script>";
}
} 
}

if($func=="login")
{
    $email=$_POST['email']; 
    $password=$_POST['password']; 
    
$sql="SELECT * from user_info WHERE email='$email' ";

$result=(mysqli_query($conn, $sql));

if ($result->num_rows>0 ){
    while ($row = $result->fetch_object()) {
        $hashed=$row->pass; 
        $id=$row->id; 
      
    }

    if (password_verify($password, $hashed)) {
        $_SESSION['session']=$id ;
        echo "<script> location.href='/from_scratch/main.php?login_success=1'; </script>";
            
    }
    else 
    {
        echo "<script> location.href='/from_scratch/login.php?login_unsuccess=1'; </script>";

}
}
else 
{
    echo "<script> location.href='/from_scratch/login.php?login_unsuccess=1'; </script>";
}

}
if($func=="logout")
{
   unset($_SESSION["session"]);
   session_destroy();

   
   echo "<script> location.href='/from_scratch/login.php?logout=1'; </script>";
}

if($func =="update")
{
    $name=$_POST['username']; 
    $email=$_POST['email'];
    $mobile=$_POST['mobile']; 
    $detail=$_POST['details'] ?? " "; 
    $filename = $_FILES["img"]["name"] ;
    $tempname = $_FILES["img"]["tmp_name"];    
    $folder = "../images/user_images/".$filename;
    $directory = "images/user_images/".$filename;

    $sql="SELECT email from user_info where email ='$email' and id != '$id' ";
    $result=(mysqli_query($conn, $sql)); 

if ($result->num_rows>0 ) {
    echo "<script> location.href='/from_scratch/profile.php?email_present=1'; </script>";

}
if($filename == null)
{
    $sql="UPDATE user_info set name='$name' , email= '$email',mobile='$mobile' , details='$detail'  where id ='$id' ";
    $result=(mysqli_query($conn, $sql));  
    if($result)
    {
        echo "<script> location.href='/from_scratch/profile.php?profile_updated=1'; </script>";
       

    }
}
 if ($filename != null) 
{
    move_uploaded_file($tempname, $folder);
    $sql="UPDATE user_info set name='$name' , email= '$email',mobile='$mobile' , details='$detail' , image='$directory'   where id ='$id' ";
    $result=(mysqli_query($conn, $sql));  
    if($result)
    {
        echo "<script> location.href='/from_scratch/profile.php?profile_updated=2'; </script>";
       

    }

}


}


if($func=="product_register")
{

    $check = 0 ; 
    $name = $_POST['name']; 
    $category = $_POST['category']; 
    $location = $_POST['location']; 
    $address = $_POST['address']; 
    $description = $_POST['description']; 
    $starting_price = $_POST['starting_price']; 
    $goal_price= $_POST['goal_price']; 
    $ending_time= $_POST['ending_time']; 
    $approval = 0 ; 
    $h=0; 
    $sql = "SELECT * from product_additional_info_tags where product_category_id ='$category'"; 
    $result=(mysqli_query($conn, $sql));
                         
    while($row=mysqli_fetch_array($result))
    {
        $details[$h]= $row['headings'];
         
        $h++; 
    }



 
    $sql="INSERT INTO product_info (name,address,location,approval,description,start_price,goal_price,end_time,product_category_id,user_id) VALUES ('$name','$address','$location','$approval','$description','$starting_price','$goal_price','$ending_time','$category','$id')";

     if(mysqli_query($conn,$sql))
 
{
  
  

    $last_id = $conn->insert_id;
     for($i=0 ; $i<$h ; $i++)
     {
      
             $heading[$i]= $_POST['heading'.$i.'']; 

             $sql =  "INSERT INTO product_additional_info (product_id, heading ,details) VALUES ('$last_id' , '$details[$i]','$heading[$i]')"; 
             mysqli_query($conn,$sql); 
       
       
     }

     foreach ($_FILES['upload']['name'] as $key => $name){
  
         $filename = time() . "_" . $name;
         $folder = "../images/product_images/".$filename;
         $directory = "images/product_images/".$filename;
         move_uploaded_file($_FILES['upload']['tmp_name'][$key], $folder);

         $sql="INSERT INTO product_images (product_id,image) VALUES ('$last_id','$directory')";
         if(mysqli_query($conn,$sql))
         {
             echo "<script> location.href='/from_scratch/product_page.php?search_result=$last_id&product_listed=1'; </script>";
            
         }

  
        
     }

    
 }
 else 
  {
      echo "<script> location.href='/from_scratch/product_register.php?product_register_error=1'; </script>";
      if(mysqli_query($conn,$sql))
     {

     }
}
}

if($func == "product_verification")
{
    $description = $_POST['description']; 
    $product_id = $_POST['product_id']; 

    foreach ($_FILES['upload']['name'] as $key => $name){
  
        $filename = time() . "_" . $name;
        $folder = "../images/verification_images/".$filename;
        $directory = "images/verification_images/".$filename;
        move_uploaded_file($_FILES['upload']['tmp_name'][$key], $folder);

        $sql="INSERT INTO product_verification (product_id,description,documents) VALUES ('$product_id','$description', '$directory' )";
        if(mysqli_query($conn,$sql))
        {
            echo "<script> location.href='/from_scratch/active_listing.php?verification_done=1'; </script>";
           
        }
        else{
            echo "<script> location.href='/from_scratch/product_register.php?verfication_error=1'; </script>";
        }

 
       
    }
}




if($func == "update_product")
{
    $i = $_POST['i']; 
    $product_id = $_POST['product_id']; 
    $user_id = $_POST['id']; 
    $product_user_id = $_POST['product_user_id']; 
    $s = 0 ; 
    $name = $_POST['name']; 
    $address = $_POST['address'] ; 
    $location = $_POST ['location'] ; 
    $description = $_POST['description'] ; 
    $starting_price = $_POST['starting_price'] ; 
    $goal_price = $_POST['goal_price'] ; 

    


    if($product_user_id == $user_id)
    {
        

        for($j = 0 ; $j<=$i ; $j++) 
        {
            $detail[$j]= $_POST['detail'.$j.''] ?? " "; 
           
        }

        $sql= "SELECT * from product_additional_info where product_id = '$product_id'" ; 
        $result=(mysqli_query($conn,$sql));
        while($row = mysqli_fetch_array($result))
        {
            $heading[$s] = $row['heading']; 
        

            $sql1 = "UPDATE product_additional_info set heading='$heading[$s]' , details = '$detail[$s]' where product_id = '$product_id' and heading='$heading[$s]'" ; 
            $result1=(mysqli_query($conn,$sql1));



            $s++ ; 

        }
        $sql = "UPDATE product_info set name = '$name' , address = '$address' , location = '$location' , description='$description' , start_price = '$starting_price' , goal_price = '$goal_price' where id = '$product_id'" ; 
        $result = (mysqli_query($conn,$sql));
        if($result)
        {
            echo "<script> location.href='/from_scratch/product_page.php?update_done=1&search_result=$product_id'; </script>";
            

        }
        else
        {
            echo "<script> location.href='/from_scratch/update_product.php?update_error=1&product=$product_id'; </script>";


        }


        


       




    }
    else 
    {
        echo "<script> location.href='/from_scratch/update_product.php?update_error=1&product=$product_id'; </script>";

    }



   




}


if($func == "place_bid")
{
    $starting_price = $_POST['starting_price']; 
    $product_id = $_POST['product_id']; 
    $product_user_id = $_POST['product_user_id']; 
    $user_id = $_POST['user_id']; 
    $paypal = $_POST['paypal1']?? 0 ; 
    $credit_card = $_POST['credit_card1'] ?? 0 ; 
    $bank = $_POST['bank1'] ?? 0 ; 
    $bid_amount = $_POST['bid_amount']; 

    $sql = "SELECT * from user_info where id = $product_user_id"; 
    $result=(mysqli_query($conn, $sql));
    {
        while($row=mysqli_fetch_array($result))
        {
           $seller_email = $row['email'];
           $seller_name = $row['name']; 
        }

    }
    $sql = "SELECT * from user_info where id = '$user_id'"; 
    $result=(mysqli_query($conn, $sql));
    {
        while($row=mysqli_fetch_array($result))
        {
           $buyer_name = $row['name'];

        }

    }
    

    $sql = "INSERT into bidding_info (seller_id , buyer_id , product_id , bid_amount , paypal , credit_card , bank ) VALUES ('$product_user_id','$user_id','$product_id','$bid_amount','$paypal','$credit_card','$bank')" ; 
    if(mysqli_query($conn,$sql))
    {
        if($bid_amount > $starting_price)
        {
            $sql = "UPDATE product_info set start_price='$bid_amount' where id='$product_id'"; 
            mysqli_query($conn,$sql); 

        }
        $msg = " ".$buyer_name." has posted a bid on your product of amount ".$bid_amount."rs";
        $sql = "INSERT into notification (user_id , msg , mark) values ('$product_user_id','$msg','0')"; 
        mysqli_query($conn, $sql); 

     
        
        ?>
          <script type="text/javascript">
        var params = 
        {
            buyer: "<?php echo $buyer_name; ?> ", 
            seller: "<?php echo $seller_name; ?> ", 
            amount: <?php echo $bid_amount ;?> ,
            seller_email:" <?php echo $seller_email ; ?>"
        }
        emailjs.send("service_pvbrpuk","template_pemfkbc", params , "Cw95nl4PTt9tzdwhD").then(function(response) {
       console.log('SUCCESS!', response.status, response.text);
    }, function(error) {
       console.log('FAILED...', error);
    });
    


    </script>
    


<?php

    echo "<script> location.href='/from_scratch/product_page.php?search_result=$product_id&product_listed=1'; </script>";

            

        
    }
    else 
    {


    }





}




















if($ajax_func == "something" )
{
    $to_id=$_POST['to_id']; 
    $sql="Select * from user_info where id = '$to_id'"; 
    $data=array(); 
    $i=0; 
    
    
    $result=(mysqli_query($conn,$sql));
    while($row = mysqli_fetch_array($result))
    {
        $data['name'][$i]=$row['name']; 
        $data['image'][$i]=$row['image'];
        $i++;
    }
    echo json_encode($data); 
}

if($ajax_func == "notification")
{
    $user_id = $_POST['id']; 
    $sql= "UPDATE notification set mark='1' where user_id = '$user_id'"; 
    if(mysqli_query($conn,$sql))
    {
        $result = "updated"; 
        echo json_encode($result);
    }
}

if($ajax_func == "get_chat" )
{
    $data = 123;
    // $to_id=$_POST['to_id']; 
    // $sql="Select * from user_info where id = '$to_id'"; 
    // $data=array(); 
    // $i=0; 
    
    
    // $result=(mysqli_query($conn,$sql));
    // while($row = mysqli_fetch_array($result))
    // {
    //     $data['name'][$i]=$row['name']; 
    //     $data['image'][$i]=$row['image'];
    //     $i++;
    // }
    echo json_encode($data); 
}

if($ajax_func == "product_additional_info_tags")
{
    $output = "";
    $product_category_id = $_POST['product_category_id']; 
    $heading=array(); 
    $i=0; 

    $sql="SELECT * FROM product_additional_info_tags where product_category_id = '$product_category_id'"; 
    $result=(mysqli_query($conn,$sql));
    while($row=mysqli_fetch_array($result))
    {
        $heading[$i]=$row['headings']; 
        
        $output.='                     <div class="col-md-12"><label class="labels">' .$row['headings'] . '</label><input type="text"  class="form-control" name="heading' .$i . '"  placeholder="Enter ' .$row['headings'] . '" ></div>        '; 
        $i++; 

    }
    echo $output; 
    

}


if($ajax_func == "winner")
{
    $id = $_POST['id']; 
    $data = $_POST['date'] ;
    $mark = 0 ;  
    $sql = "SELECT * from bidding_info where id = '$id'" ;
    $x=(mysqli_query($conn,$sql));
    while($row=mysqli_fetch_array($x))
    {
        $buyer_id = $row['buyer_id'] ; 
        $product_id = $row['product_id'] ; 
        $bid_amount = $row['bid_amount'] ; 

    } 

    $sql = "UPDATE  product_info set winner='$id' , end_time = '$data' where id = '$product_id'  " ; 
    if(mysqli_query($conn,$sql))
    {
        $msg = "You have been choosen winner in one of your bids" ; 
        $sql = "INSERT into notification (user_id , msg , mark) values ('$buyer_id','$msg','$mark')" ; 
        $result = mysqli_query($conn, $sql) ; 
        if($result)
        {
            echo json_encode("smile");

        }

    }

}


























if($func == "delete_product")
{
    $product_id = $_GET['product']; 
    $sql = "DELETE  from bidding_info where product_id = '$product_id'" ; 
    if(mysqli_query($conn,$sql))
    {
        $sql1 = "DELETE from product_additional_info where product_id = '$product_id'" ; 
        if(mysqli_query($conn, $sql1))
        {
            $sql4 = "DELETE from product_images where product_id = '$product_id'" ; 
            if(mysqli_query($conn, $sql4))
            {
            $sql2 = "DELETE from product_info where id ='$product_id'" ; 
            if(mysqli_query($conn, $sql2))
            {
                echo "<script> location.href='/from_scratch/active_listing.php?delete_success=1'; </script>";

            }
        }
        }
    } 
    else
    {
        echo "<script> location.href='/from_scratch/acitve_listing.php?delete_error=1'; </script>";

    }
}