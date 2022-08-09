<?php 

include("admin_head.php") ; 

?>
    <center><h1>USER INFO </h1></center>


<div class="col-lg-12">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div>

                    <form id="signup_form" action="php_backend_stuff/admin_backend.php?func=adduser" method="post" onsubmit="return(signup_validation())">
                       
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
                        <button type="submit" class="btn btn-blue text-center" >Add user</button>
                    </div>
                </form>
                    <div class="row mb-4 px-3">
                    </div>
                </div>
            </div>