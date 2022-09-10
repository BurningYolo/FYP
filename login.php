<?php
 include("loader.php") ; 
session_start(); 
if(isset($_SESSION['session']))
{
    $id=$_SESSION['session']; 
}
include("head.php"); 

?>

<style> 
body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #B0BEC5;
    background-size: 100% 100%;
}

.card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px;
}

.card2 {
    margin: 0px 40px;
}

.logo {
    width: 200px;
    height: 100px;
    margin-top: 20px;
    margin-left: 35px;
}

.image {
    width: 500px;
    height: 380px;
    border: black 1px dotted;
}

.border-line {
    border-right: 1px solid #EEEEEE;
}




.line {
    height: 1px;
    width: 45%;
    background-color: #E0E0E0;
    margin-top: 10px;
}


.or {
    width: 10%;
    font-weight: bold;
}

.text-sm {
    font-size: 14px !important;
}

::placeholder {
    color: #BDBDBD;
    opacity: 1;
    font-weight: 300
}

:-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

::-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

#password{
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 2px;
    margin-bottom: 5px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2c5037;
    font-size: 14px;
    letter-spacing: 1px;
}

#email{
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 2px;
    margin-bottom: 5px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2c5037;
    font-size: 14px;
    letter-spacing: 1px;
}

#password:focus, #email:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid green;
    outline-width: 0;
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0;
}

a {
    color: inherit;
    cursor: pointer;
}

.btn-blue {
    background-color: green;
    width: 150px;
    color: #fff;
    border-radius: 2px;
}

.btn-blue:hover {
    background-color: rgb(25, 216, 92); 
    cursor: pointer;
}

.bg-blue {
    color: #fff;
    background-color: rgb(21, 139, 21);
}
.signup_success
{
    
        background-color: green;
        color: white;
        width: 100%;
        height: auto;
        text-align: center;
        position: absolute;

        

}
.login_unsuccess ,  .need_login
{
    
        background-color: red;
        color: white;
        width: 100%;
        height: auto;
        text-align: center;
        position: absolute;

        

}

@media screen and (max-width: 991px) {
    .logo {
        margin-left: 0px;
    }

    .image {
        width: 300px;
        height: 300px;
    }

    .border-line {
        border-right: none;
    }

    .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px;
    }
}

</style>
<?php 
if(isset($_GET['account_created']))
{
?>
<div class="signup_success" id="signup_success">
    <p>SignUp Successful</p>

</div>
<?php 
unset($_GET['account_created']); 
}
?>








<?php 
if(isset($_GET['password_change']))
{
?>
<div class="signup_success" id="signup_success">
    <p>Password Successfully Updated </p>

</div>
<?php 
unset($_GET['password_change']); 
}
?>



<?php 
if(isset($_GET['password_change_error']))
{
?>
<div class="login_unsuccess" id="login_unsuccess">
    <p>Error Updating Password please try again later </p>

</div>
<?php 
unset($_GET['password_change_error']); 
}
?>






<?php 
if(isset($_GET['need_login']))
{
?>
<div class="need_login" id="need_login">
    <p>Need to be logged in first</p>

</div>
<?php 
unset($_GET['account_created']); 
}
?>

<?php 
if(isset($_GET['login_unsuccess']))
{

?>
<div class="login_unsuccess" id="login_unsuccess">
    <p>Email or Password is incorrect</p>
<?php
unset($_GET['login_unsuccess']); 
}
?>
<?php 

if(isset($_GET['logout']))
{
?>
<div class="signup_success" id="logout">
    <p>Logged Out</p>

</div>
<?php 
unset($_GET['logout']); 
}
?>



</div>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row">
                        <!-- <img src="" class="logo"> -->
                    </div>
                    <div class="row px-3 justify-content-center  py-5 mt-4 mb-3 border-line">
                        <img src="images/logos&stuff/easy_auction1.png" class="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        <h3 style="color: green;"class="mb-0 mr-4 mt-2">Login to EasyAuction</h3>
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div>
                       
                    </div>
                    <form name="login_form" method="POST" action="php_backend_stuff/backend.php?func=login">
                    <div class="row px-3">
                        <label class="mb-1"><h6 class="mb-0 text-sm">Email Address</h6></label>
                        <input class="mb-4" id="email" type="email" name="email" placeholder="Enter a valid email address" required>
                    </div>
                    <div class="row px-3">
                        <label class="mb-1"><h6 class="mb-0 text-sm">Password</h6></label>
                        <input id="password" type="password" name="password" placeholder="Enter password" required>
                    </div>
                   
                    <div class="row mb-3 px-3">
                        <button type="submit" class="btn btn-blue text-center" >Login</button>
                    </div>
                </form>
                    <div class="row mb-4 px-3">
                        <small class="font-weight-bold">Don't have an account? <a href="signup.php"class="text-success ">Register</a></small>
                        <Br>
                        <br>

                        <small class="font-weight-bold">Forgot Password ?   <button  data-toggle="modal" data-target="#place_bid_amount"  class="text-success " type="button" style="border: transparent; text-decoration: underline; " >Click here </button></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3">
                <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2022. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto">
                 
                </div>
            </div>
        </div>
    </div>
</div>





<div id="place_bid_amount" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
  <center><h4 class="modal-title">Please Enter your email linked to the account  </h4></center>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
   </div>
   <div class="modal-body">
<center><div id="email_1" ></div></center>

      <label class="mb-1"><h6 class="mb-0 text-sm">Email Address<span style="color: red"> </span></h6></label>
     <input style="width: 100% ;" class="mb-4" id="email_for_pass" type="email" name="email" placeholder="Enter a valid email address" required>
       
       <center><input class="btn btn-success" type="button" value="Submit" onclick="password_verify_email()" ></center>
       
    </form>
  
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>

    function password_verify_email()
    {
        var email = document.getElementById("email_for_pass").value 
        var link = "http://localhost/from_scratch/password_change.php?password_change="; 
        console.log(email) 

        $.ajax({
    url:'php_backend_stuff/backend.php',
    type:"POST", 
    data:{
     
     ajax_func:"password_verify_email",
     email:email 


    }, 
    success:function(result)
    {
        console.log(result) 
        var result = JSON.parse(result) 
        if(result.value == 0 )
        {
            document.getElementById("email_1").style.backgroundColor="red" ; 
            document.getElementById("email_1").style.color="white" ; 
            document.getElementById("email_1").style.height="auto" ; 
            document.getElementById("email_1").style.width="100%" ; 
            document.getElementById("email_1").innerHTML="Please Enter Valid Email"


            
        }
        else if (result.value == 1)
        {
            document.getElementById("email_1").style.backgroundColor="green" ; 
            document.getElementById("email_1").style.color="white" ; 
            document.getElementById("email_1").style.height="auto" ; 
            document.getElementById("email_1").style.width="100%" ; 
            document.getElementById("email_1").innerHTML="Please view your email for Password change"; 
            var change_link = link.concat(result.link);
            console.log(change_link)



        
        var params = 
        {
           to_email : email , 
           link : change_link , 
        }
        emailjs.send("service_q59dnub","template_vw5t59m", params , "Cw95nl4PTt9tzdwhD").then(function(response) {
       console.log('SUCCESS!', response.status, response.text);
    }, function(error) {
       console.log('FAILED...', error);
    });
    



    }
        
    }
})
    }



    
</script>
