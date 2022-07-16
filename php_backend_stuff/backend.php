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

    $sql="INSERT INTO product_info (name,address,location,approval,description,start_price,goal_price,end_time,product_category_id,user_id) VALUES ('$name','$address','$location','$approval','$description','$starting_price','$goal_price','$ending_time','$category','$id')";

    if(mysqli_query($conn,$sql))
{
    $check++; 
    $last_id = $conn->insert_id;
    if(isset($_POST['heading1']))
    {
       
        $heading1 = $_POST['heading1']; 
        $detail1 = $_POST['detail1']; 
        $sql="INSERT INTO product_additional_info (product_id,heading,detail) VALUES ('$last_id','$heading1','$detail1')";
        if(mysqli_query($conn,$sql))
        {
            $check++; 
            if(isset($_POST['heading2']))
            {
             
                $heading2 = $_POST['heading2']; 
                $detail2 = $_POST['detail2']; 
                $sql="INSERT INTO product_additional_info (product_id,heading,detail) VALUES ('$last_id','$heading2','$detail2')";
                if(mysqli_query($conn,$sql))
                {
                    $check++; 
                    if(isset($_POST['heading3']))
                    {
                      
                        $heading3 = $_POST['heading3']; 
                        $detail3 = $_POST['detail3']; 
                        $sql="INSERT INTO product_additional_info (product_id,heading,detail) VALUES ('$last_id','$heading3','$detail3')";
                        if(mysqli_query($conn,$sql))
                        {
                            $check++; 
                            if(isset($_POST['heading4']))
                            {
                             
                                $heading4 = $_POST['heading4']; 
                                $detail4 = $_POST['detail4']; 
                                $sql="INSERT INTO product_additional_info (product_id,heading,detail) VALUES ('$last_id','$heading4','$detail4')";
                                if(mysqli_query($conn,$sql))
                                {
                                    $check++; 

                                }
                                else{

                                }



                            }
                            else 
                            {

                            }


                        }
                        else{

                        }

                    }
                    else{

                    }

                }
                else{

                }
            }
            else{

            }
            
        }else{

        }


    }else{

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


if($func == "message")
{
    $to_id = $_POST['to_id']; 
    $from_id = $_POST['from_id']; 
    $message = $_POST['msg']; 
    $sql="INSERT INTO user_chat (to_user, from_user , msg) VALUES ('$to_id'  , '$from_id' , '$message')";
    $result=(mysqli_query($conn,$sql));
    if($result)
    {
        echo "POGCHAMP"; 
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