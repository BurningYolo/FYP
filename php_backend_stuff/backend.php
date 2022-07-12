<?php
session_start();
if(isset($_SESSION['session'])){
    $id=$_SESSION['session']; 
 
  }
include("connection.php"); 


$func = $_GET['func'] ?? 'null';

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


