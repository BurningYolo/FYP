
<!doctype html>
<html lang="en">
  <head>
  	<title>Head</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
    <?php 
    include("php_backend_stuff/connection.php") ; 

    include ("libraries.php") ;

    ?>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/head.css">
  
  
     

		
  </head>
  <body>
	<nav class="navbar navbar-expand-lg " >
        <div class="container-fluid">
         <a class="navbar-brand" href="user_management.php">Easy Auctions Admin Panel </a>
          </button>
            

            </ul>
        </div>
      </nav>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product Management</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="admin_productlist.php" > Product list</a>
                    
                </li>
                <li>
                <a href="admin_productregister.php">Add Prdouct </a>
                </li>
	            </ul>
	          </li>
	          <li>
	              <a href="admin_verifyproducts.php">Approve Products</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">User Management</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="admin_userlist.php"">User List</a>
                </li>
                <li>
                <a  href="admin_adduser.php">Add User </a>
                </li>
              </ul>
	          </li>

            <li>
              <a href="#category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Category Management</a>
              <ul class="collapse list-unstyled" id="category">
                <li>
                    <a href="admin_categorylist.php"">Category List</a>
                </li>
                <li>
                <a  href="admin_addcategory.php">Add Category </a>
                </li>

                <li>
                <a  href="admin_adduser.php">Add Tags to Category </a>
                </li>
              </ul>
	          </li>
	        
           

	        </ul>
    	</nav>
      <button id="sidebar_something" onclick="display_siderbar()">>></button>

      <div id="content" class="p-4 p-md-5 pt-5  " style="overflow-y: scroll;">
      <script>

        function display_siderbar()
        {
          var s = document.getElementById("sidebar")
          if (s.style.display === "none") {
    s.style.display = "block";
  } else {
    s.style.display = "none";
  }
        }
      </script>

   
     