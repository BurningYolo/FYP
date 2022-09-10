<?php
error_reporting(0) ;  
include("php_backend_stuff/connection.php") ; 
 include("libraries.php") ; 
 
 $email_change = $_GET['email_change'] ?? "1" ; 

 if($email_change != 1)
 {
    $sql  = "Select * from user_info where email_request = '$email_change' " ; 
    $x=(mysqli_query($conn,$sql));
    while($row=mysqli_fetch_array($x))
    {
        $id = $row['id'] ; 

    } 

    $sql = "Update user_info set verified = '1' , email_request='NULL'  where id = '$id'" ; 
    if(mysqli_query($conn,$sql))
    {
        echo "Email has been successfully verified" ; 
    }
    else 
    {
        echo "Error verifying Email Kindly retry agian " ; 
    }


    

 
 }

?>