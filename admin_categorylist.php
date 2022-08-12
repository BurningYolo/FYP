<?php 
include("admin_head.php"); 

?>


<?php


    ?>
    <center><h1>USER INFO </h1></center>

<center>
<?php 
      $sql="SELECT * FROM product_category ";
      $result=(mysqli_query($conn,$sql));

 



?>
<div class="table-wrapper">
  <?php 

  echo "  <table id='user_table' class='fl-table'>
        <thead>
        <tr>
            <th> ID</th>
            <th> NAME </th>
            <th> EDIT </th>
            <th> DELETE </th>
        </tr>
        </thead> "
        ?>

      
          <?php
          while($row = mysqli_fetch_array($result))
          {
          $id=$row['id']; 
          $name = $row['category'] ; 





          
            echo "<tr>";

  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['category'] . "</td>";


  ?>

  <!-- <td> <a href=" " data-toggle="modal" data-target="#update_data_Modal"> <i class="far fa-edit"></i></a></td> -->
  <td><a href=""><button class="btn btn-primary" >Edit</button></a></td>
  <td><a href="php_backend_stuff/admin_backend.php?func=delete_category&id=<?php echo $id ?>"><button class="btn btn-danger">Delete</button></a></td>
  <?php
  
  
  echo "</tr>";

  }

echo "</table>";


     
