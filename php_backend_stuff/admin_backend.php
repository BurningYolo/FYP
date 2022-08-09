<?php 
include("connection.php"); 
$func = $_GET["func"] ; 
if($func =="update")
{
    $id = $_POST['id'] ; 
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
    echo '<script> alert("Email is already present inside database")</script>';
    echo "<script> location.href='/from_scratch/admin_userlist.php'; </script>";
    exit; 


}
if($filename == null)
{
    $sql="UPDATE user_info set name='$name' , email= '$email',mobile='$mobile' , details='$detail'  where id ='$id' ";
    $result=(mysqli_query($conn, $sql));  
    if($result)
    {
        echo '<script> alert("Updated Information")</script>';
        echo "<script> location.href='/from_scratch/admin_userlist.php'; </script>";

       

    }
}
 if ($filename != null) 
{
    move_uploaded_file($tempname, $folder);
    $sql="UPDATE user_info set name='$name' , email= '$email',mobile='$mobile' , details='$detail' , image='$directory'   where id ='$id' ";
    $result=(mysqli_query($conn, $sql));  
    if($result)
    {
        echo '<script> alert("Updated Information")</script>';
        echo "<script> location.href='/from_scratch/admin_userlist.php'; </script>";


    }
}

}

if($func == "delete")
{
    $id = $_GET['id'] ; 
    echo $id ; 
    $sql = "DELETE from bidding_info where buyer_id OR seller_id = '$id'" ; 
    $result=(mysqli_query($conn, $sql));  
    $sql = "DELETE from product_info where user_id = '$id'" ;
    $result=(mysqli_query($conn, $sql));  
    $sql = "DELETE from user_info where id = '$id'" ; 
    $result=(mysqli_query($conn, $sql));  

    if($result)
    {
        echo '<script> alert("User Deleted")</script>';
        echo "<script> location.href='/from_scratch/admin_userlist.php'; </script>";

    }





    
}

if($func=="adduser")
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
    echo '<script> alert("Email Already Present inside Database")</script>';
    echo "<script> location.href='/from_scratch/admin_userlist.php'; </script>";
    exit; 

}
else 
{

$sql="INSERT INTO user_info (name,email,pass,role_id,image) VALUES ('$name','$email','$hashed','$role_id', '$image')";

if(mysqli_query($conn,$sql))
{
    echo '<script> alert("User Successfully Added")</script>';
    echo "<script> location.href='/from_scratch/admin_userlist.php'; </script>";
}
} 
}


if($func == "addproduct")
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



 
    $sql="INSERT INTO product_info (name,address,location,approval,description,start_price,goal_price,end_time,product_category_id,user_id) VALUES ('$name','$address','$location','$approval','$description','$starting_price','$goal_price','$ending_time','$category','1')";

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
            echo '<script> alert("Product Successfully Added")</script>';
            echo "<script> location.href='/from_scratch/admin_userlist.php'; </script>";
            
         }

  
        
     }

    
 }
 else 
  {
    echo '<script> alert("Error Adding Product")</script>';
    echo "<script> location.href='/from_scratch/admin_userlist.php'; </script>";
      if(mysqli_query($conn,$sql))
     {

     }
}
}



?>