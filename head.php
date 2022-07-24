<?php 
include("php_backend_stuff/connection.php") ; 
if(isset($_SESSION['session']))
{
  $id=$_SESSION['session'];
  $sql="SELECT * from user_info WHERE id='$id' ";

  $result=(mysqli_query($conn, $sql));
  
  if ($result->num_rows>0 ){
      while ($row = $result->fetch_object()) {
          $name=$row->name; 
          $email=$row->email; 
        
      }
    }
  

}
else 
{
  $name=rand(9000,1000000); 
  $email=rand(9000,1000000); 
  $id=rand(9000,1000000); 
 
}
?>



<!DOCTYPE html>
<html>
  
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php 
    include ("libraries.php"); 

    ?>

    <style>
        .bg-custom-1 {
     background-color: #85144b;
        }

.bg-custom-2 {
background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
        }
        .topnav-right {
        float: right;
}
        </style>
        <!-- Start of Async Drift Code -->
<script>
"use strict";

!function() {
  var t = window.driftt = window.drift = window.driftt || [];
  if (!t.init) {
    if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
    t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
    t.factory = function(e) {
      return function() {
        var n = Array.prototype.slice.call(arguments);
        return n.unshift(e), t.push(n), t;
      };
    }, t.methods.forEach(function(e) {
      t[e] = t.factory(e);
    }), t.load = function(t) {
      var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
      o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
      var i = document.getElementsByTagName("script")[0];
      i.parentNode.insertBefore(o, i);
    };
  }
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.identify("<?php echo $id ?>", {
        email: "<?php echo $email ?>",
        name: "<?php echo $name ?>",
        id:"<?php echo $id ?>"

      
      });
      console.log("<?php echo $name ?>")
drift.load('3pxe6ntxf5dd');
</script>
<!-- End of Async Drift Code -->
</head>
<body>
    <nav class="navbar navbar-dark bg-success navbar-expand-sm">
        <div class="navbar">
            <a class="navbar-brand" href="#">
                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/logo_white.png" width="30" height="30"  alt="logo">
               <b> EasyAuction</b>
              </a>

        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="/from_scratch/product_register.php">Add Product </a>
              </li>
              <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                $sql="SELECT * from product_category ";
                $result=(mysqli_query($conn, $sql));
                
                while($row=mysqli_fetch_array($result))
                {

                ?>
                <a class="dropdown-item" href="search.php?product_category=<?php echo $row['id'] ?>"><?php echo $row["category"] ?></a>
            
                <?php
                }

                ?>
                  
                </div>
                <?php 
                if(!isset($_SESSION['session']))
                {
                ?>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="login.php">Login </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="signup.php">Signup </a>
              </li>
              <?php 
                }
                ?>
            </ul>
     
       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbar-list-4">
         
            <ul class="navbar-nav ml-auto  ">
                <li >

                    <form action="search.php" method="POST"class="d-flex" style="margin-top: 8px">
                        <input class="form-control " name="search" type="search" placeholder="Search" aria-label="Search" required>
                        <button class="btn btn-light " type="submit">Search</button>
                      </form>
                </li>
                <?php 
                if(isset($_SESSION['session']))
                {
                  $id=$_SESSION['session']; 

                  $sql="SELECT * FROM user_info WHERE id='$id' ";
                  $x=(mysqli_query($conn,$sql));
                  while($row=mysqli_fetch_array($x))
                  {
                      $image = $row['image']; 
                   
              
              
                      
                      
                  }
                ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="<?php echo $image ?>" width="40" height="40" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="profile.php"> Profile</a>
                  <a class="dropdown-item" href="active_listing.php">Active Listings</a>
                  <a class="dropdown-item" href="php_backend_stuff/backend.php?func=logout">Log Out</a>
                </div>
              </li>   
              <?php 

                }
                ?>
            </ul>
          </div>
          
   
      </nav>
      <script>
      </script>