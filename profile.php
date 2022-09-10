<?php
session_start(); 
include ("head.php"); 

if(isset($_SESSION['session']))
{
    $id=$_SESSION['session']; 

    $sql="SELECT * FROM user_info WHERE id='$id' ";
    $x=(mysqli_query($conn,$sql));
    while($row=mysqli_fetch_array($x))
    {
        $name = $row['name']; 
        $email = $row['email']; 
        $mobile = $row['mobile']; 
        $image = $row['image']; 
        $details = $row['details']; 
        $verified = $row['verified'] ; 


        
        
    }

?> 

<style>


body {
    background: #B0BEC5; 
}
.input_image
{
    background-color: green;
    color: white;
    border: 2px solid black;
    padding: 2px;
    cursor: pointer;
    
}

.form-control:focus {
    box-shadow: none;
    border-color: green;
}

.profile-button {
    background: green;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: silver; 
}

.profile-button:focus {
    background: green;
    box-shadow: none
}

.profile-button:active {
    background: green;
    box-shadow: none
}

.back:hover {
    color: green;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: green;
    color: #fff;
    cursor: pointer;
    border: solid 1px black; 
}
#username_error , #email_error , #mobile_error
{
    color: red;

}
.email_present
    {
        background-color: red;
        color: white;
        width: 100%;
        height: auto;
        text-align: center;
        position: absolute;

        

    }
    .profile_updated
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
if(isset($_GET['profile_updated']))
{
    
    

?>
<div class="profile_updated" id="profile_updated">
    <p>Successfully Updated Information</p>
    
</div>
<?php
unset ($_GET['profile_updated']); 
}
?>

<?php
if(isset($_GET['email_present']))
{
    
    

?>
<div class="email_present" id="email_present">
    <p>Email is Already Present inside the database</p>
    
</div>
<?php
unset ($_GET['email_present']); 
}
?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
    <form id="update_form" action="php_backend_stuff/backend.php?func=update" method="post" enctype="multipart/form-data" onsubmit="return(update_profile_validation())">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><input type="image" class="rounded-circle mt-5" width="150px" src="<?php echo $image ?>"><span class="font-weight-bold"><?php echo $name ?></span><span class="text-black-50"><?php echo $email ?></span><span><label class="input_image" for="img">Change Picture</label><input name="img" type="file"  value="<?php echo $image ?>"accept="image/png, image/gif, image/jpeg" id ="img" hidden  ></span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4  style="color: green;"class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">UserName<span id="username_error"></span></label><input type="text" class="form-control" name="username" id="username" placeholder="enter UserName" value="<?php echo $name ?>" required></div>
                    <div class="col-md-12"><label class="labels">Email<span id="email_error"></span></label><input type="email" class="form-control" name="email" id="email" placeholder="enter Email" value="<?php echo $email?>" readonly required>
                    
                
                </div>
                    <div class="col-md-12"><label class="labels">Mobile No. <span id="mobile_error"></span></label><input type="tel" pattern="[0-3]{2}[0-9]{9}" name="mobile" class="form-control" id="mobile" required placeholder="03xxxxxxxxx" value="<?php echo $mobile?>" ></div>
               
                </div>
                <div class="mt-5 text-center"><input class="btn btn-primary profile-button" value="Update" type="submit"></input></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">

                <div class="col-md-12"><label class="labels">Additional Details</label><textarea rows="5" type="text" class="form-control" id="details" name="details" placeholder="additional details" value="<?php echo $details ?>"><?php echo $details ?></textarea>
            </div>
    </form>
        </div>
    </div>
    <?php 
    if($verified != 1)
    {

    ?>
    <button class="btn-sm btn-success" style="margin-top: 10px;" id="verify_button" onclick="email_verify()">Verify Email</button>
    <?php 
    }
    else 
    {
        ?>
        <center><div class="sm bg-success" style="margin-top: 10px; color:white" >Email has been verified</div></center>


        <?php 
    }
    ?>

</div>
</div>
</div>
<center><div id="bruh" style="background-color: green; color:white ; width:500px ; height:auto ; display:none" > Verify Link has been sent to your email. </div></center>
<?php 
}
else 
{
    echo "<script> location.href='/from_scratch/login.php'; </script>";
}
?>

<script>


    function email_verify()
    {
        var email = document.getElementById("email").value; 
        console.log(email) 
        var link = "http://localhost/from_scratch/email_verify.php?email_change="; 
        console.log(email) 

        $.ajax({
    url:'php_backend_stuff/backend.php',
    type:"POST", 
    data:{
     
     ajax_func:"email_verify_email",
     email:email 


    }, 
    success:function(result)
    { 
        var result = JSON.parse(result) 
        var change_link = link.concat(result);
        console.log(result) 
        console.log(change_link)

        var params = 
        {
           to_email : email , 
           link : change_link , 
        }
        emailjs.send("service_q59dnub","template_pemfkbc", params , "Cw95nl4PTt9tzdwhD").then(function(response) {
       console.log('SUCCESS!', response.status, response.text);
      document.getElementById('bruh').style.display = "block"

    }, function(error) {
       console.log('FAILED...', error);
    });
    }

    })

    
}
    



</script>