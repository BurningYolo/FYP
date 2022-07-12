<?php
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
    background-repeat: no-repeat;
}
span 
{
    color: red;
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
    height: 500px;
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

#password , #username , #confirm_password{
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

#password:focus, #email:focus , #username:focus , #confirm_password:focus {
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
.email_present
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
        height: 220px;
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
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row">
                      
                    </div>
                    <div class="row px-3 justify-content-center mt-4 mb-3 py-5 px-5  border-line">
                    <img src="images/logos&stuff/easy_auction1.png" class="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        <h3 style="color: green;"class="mb-0 mr-4 mt-2">SignUp to EasyAuction</h3>
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div>

                    <form id="signup_form" action="php_backend_stuff/backend.php?func=signup" method="post" onsubmit="return(signup_validation())">
                       
                    </div>
                    <div class="row px-3">
                        <label class="mb-1"><h6 class="mb-0 text-sm">UserName  <span id="username_error"></span>  </h6></label>
                        <input class="mb-4" id="username" type="text" name="username" placeholder="Enter a UserName" required>
                       
                    </div>
                    <div class="row px-3">
                        <label class="mb-1"><h6 class="mb-0 text-sm">Email Address  <span id="email_error"></span></h6></label>
                        <input class="mb-4" id="email" type="email" name="email" placeholder="Enter a valid email address" required>
                       
                    </div>
           
                    <div class="row px-3">
                        <label class="mb-1"><h6 class="mb-0 text-sm">Password <span id="password_error"></span></h6></label>
                        <input id="password" type="password" name="password" placeholder="Enter password" required>
                       
                    </div>
                    <br>
                    <div class="row px-3">
                        <label class="mb-1"><h6 class="mb-0 text-sm">Re-Enter Password </h6></label>
                        <input class="mb-4" id="confirm_password" type="password" name="confirm_password" placeholder="Re-enter Password" required>
                    </div>
                    <div class="row px-3 mb-4">
                       
                    </div>
                    <div class="row mb-3 px-3">
                        <button type="submit" class="btn btn-blue text-center" >SignUp</button>
                    </div>
                </form>
                    <div class="row mb-4 px-3">
                        <small class="font-weight-bold">Already have an account? <a href="login.php" class="text-success ">Login</a></small>
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