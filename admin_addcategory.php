<?php 
include("admin_head.php") ; ;


?>

<center><h1>ADD CATEGORY </h1></center>


<div class="col-lg-12">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div>

                    <form id="signup_form" action="php_backend_stuff/admin_backend.php?func=add_category" method="post" >
                       
                    </div>
                    <div class="row px-3">
                        <label class="mb-1"><h6 class="mb-0 text-sm">Category Name   <span id="username_error"></span>  </h6></label>
                        <input class="mb-4" id="username" type="text" name="category_name" placeholder="Enter a Category" required>
                       
                    </div>

                    <div class="row mb-3 px-3">
                        <button type="submit" class="btn btn-blue text-center" >Add Category</button>
                    </div>
                </form>
                    <div class="row mb-4 px-3">
                    </div>
                </div>
            </div>