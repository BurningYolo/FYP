<?php 

include("admin_head.php") ; 

?>


<?php


    ?>
    <center><h1>USER INFO </h1></center>

<center>
<?php 
      $sql="SELECT * FROM user_info ";
      $result=(mysqli_query($conn,$sql));

 



?>
<div class="table-wrapper">
  <?php 

  echo "  <table id='user_table' class='fl-table'>
        <thead>
        <tr>
            <th> ID</th>
            <th> Profile </th>
            <th> NAME</th>
            <th> EMAIL </th>
            <th> ROLE </th>
            <th> MOBILE </th>
            <th> DESCRIPTION </th>
            <th> EDIT </th>
        
            <th> DELETE </th>
        </tr>
        </thead> "
        ?>

      
          <?php
          while($row = mysqli_fetch_array($result))
          {
          $role_id=$row['role_id']; 
          $id = $row['id'] ; 
          $sql1="SELECT * FROM user_roles where id=$role_id ";
          $result1=(mysqli_query($conn,$sql1));
          while($row1 = mysqli_fetch_array($result1))
          {
            $user_role = $row1['role']; 

          }





          
            echo "<tr>";

  echo "<td id=''>" . $row['id'] . "</td>";

  echo "<td><img id='img_tb' src=" . $row['image'] . "></td>";

  echo "<td>". $row['name'] . "</td>";

  echo "<td>" . $row['email'] . "</td>";

  echo "<td>" .$user_role. "</td>";
  echo "<td>" . $row['mobile'] . "</td>";
  echo "<td>" . $row['details'] . "</td>";


  ?>

  <!-- <td> <a href=" " data-toggle="modal" data-target="#update_data_Modal"> <i class="far fa-edit"></i></a></td> -->
  <td><a href="admin_useredit.php?data=<?php echo $id ?>"><button class="btn btn-primary" >Edit</button></a></td>
  <td><a href="php_backend_stuff/admin_backend.php?func=delete&id=<?php echo $id ?>"><button class="btn btn-danger">Delete</button></a></td>
  <?php
  
  
  echo "</tr>";

  }

echo "</table>";


     

