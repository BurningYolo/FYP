
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
                    <a href="" > Product list</a>
                    
                </li>
                <li>
                <a href="admin_productregister.php">Add Prdouct </a>
                </li>
	            </ul>
	          </li>
	          <li>
	              <a href="user_management.php?data=approve_product">Approve Products</a>
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
              <a href="#ageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Category Management</a>
              <ul class="collapse list-unstyled" id="ageSubmenu">
                <li>
                    <a href="user_management.php?data=category">Category List</a>
                </li>
                <li>
                <a data-toggle="modal" data-target="#add_category_modal">Add Category </a>
                </li>
              </ul>
	          </li>
	          <li>
              <a href="#">Blablobli</a>
	          </li>

	        </ul>
    	</nav>

      <div id="content" class="p-4 p-md-5 pt-5  ">
   
     