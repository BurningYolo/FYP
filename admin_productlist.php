<?php 

include("admin_head.php"); 

?>

<style>
   table 
   {
    width:"90%" ;  
    overflow-x: scroll;
   }
</style>

<center><h1>PRODUCT INFO </h1></center>

<center>
<?php 
      $sql="SELECT * FROM product_info ";
      $result=(mysqli_query($conn,$sql));

 



?>
<div class="table-wrapper">
  <?php 

  echo "  <table  id='user_table' class='fl-table'>
        <thead>
        <tr>
            <th> ID</th>
            <th> PICTURE </th>
            <th> NAME </th>
            <th> ADDRESS</th>
            <th> LOCATION </th>
            <th> DESCRIPTION </th>
            <th> START PRICE </th>
            <th> GOAL PRICE </th>
            <th> END TIME </th>
            <th> POSTED BY </th>
            <th> WINNER </th>
            <th> EDIT </th>
            <th> DELETE </th>
        </tr>
        </thead> "
        ?>

      
          <?php
          while($row = mysqli_fetch_array($result))
          {
          $id = $row['id'] ; 
          $user_id = $row['user_id'] ; 
          $sql1="SELECT * FROM product_images where product_id='$id' limit 1 ";
          $result1=(mysqli_query($conn,$sql1));
          while($row1 = mysqli_fetch_array($result1))
          {
            $image = $row1['image']; 

          }
          $sql2="SELECT * FROM user_info where id='$user_id'  ";
          $result2=(mysqli_query($conn,$sql2));
          while($row2 = mysqli_fetch_array($result2))
          {
            $user_image = $row2['image']; 
            $user_name = $row2['name'] ; 

          }





          
            echo "<tr>";

  echo "<td id=''>" . $id . "</td>";

  echo "<td><img id='img_tb' src=" . $image . "></td>";

  echo "<td>". $row['name'] . "</td>";

  echo "<td>" . $row['address'] . "</td>";

  echo "<td>" . $row['location'] . "</td>";

  echo "<td>" . $row['description'] . "</td>";

  echo "<td>" . $row['start_price'] . "</td>";

  echo "<td>" . $row['goal_price'] . "</td>";

  echo "<td>" . $row['end_time'] . "</td>"; ?> </center> <?php 

  echo "<td><img id='img_tb' src=" . $user_image . "> . $user_name . </td>"; 
  ?>
  <center>
    <?php

  echo "<td>" . $row['winner'] . "</td>";



  ?>

  <!-- <td> <a href=" " data-toggle="modal" data-target="#update_data_Modal"> <i class="far fa-edit"></i></a></td> -->
  <td><a href="admin_updateproduct.php?product=<?php echo $id ?>"><button class="btn btn-primary" >Edit</button></a></td>
  <td><a href="php_backend_stuff/admin_backend.php?func=delete_product&product_id=<?php echo $id ?>"><button class="btn btn-danger">Delete</button></a></td>
  <?php
  
  
  echo "</tr>";

  }

echo "</table>";
