<?php 
include("admin_head.php") ; 
?>
   <center><h1>UN APPROVED PRODUCTS </h1></center>
   <?php


?>
    <center>
<?php 
$sql = "SELECT * from product_info where approval = 0" ; 
$result = mysqli_query($conn , $sql) ;


 



?>
<div class="table-wrapper">
  <?php 

  echo "  <table id='user_table' class='fl-table'>
        <thead>
        <tr>
            <th> ID</th>
            <th> PRODUCT </th>
            <th> APPROVAL</th>
            <th> PENDING DOCUMENTS </th>
            <th> SEE DOCUMENTS </th>
            <th> APPROVE </th>
            <th> REJECT </th>
        
        </tr>
        </thead> " ;
        

        while($row = mysqli_fetch_array($result))
        {
            $i = 0 ; 
        $id=$row['id']; 
        $approval = $row['approval'] ; 
        $name = $row['name'] ; 

    $sql1="SELECT * FROM product_images where product_id='$id' limit 1 ";
    $result1=(mysqli_query($conn,$sql1));
    while($row1 = mysqli_fetch_array($result1))
    {
      $image = $row1['image']; 

    }
    $sql2="SELECT * FROM product_verification where product_id='$id'  ";
    $result2=(mysqli_query($conn,$sql2));
    while($row2 = mysqli_fetch_array($result2))
    {
        $description = $row2['description'] ;
        $verfify[$i] = $row2['documents'] ; 
        $i++; 
      

    }
    if(isset($verfify))
    {
      $count = count($verfify);
    }

    
          
    echo "<tr>";
    echo "<td>". $row['id'] . "</td>";

    echo "<td id=''><img id='img_tb' src=" . $image . " " . $row['name'] . " ></td>";

    if($approval == 0)
    {
      ?> <td id=''><img id='img_tb' src="images/logos&stuff/red.png" ></td><?php

    }
    else 
    {
      ?> <td id=''><img id='img_tb' src="images/logos&stuff/green.png" ></td><?php
      
    }
    if($i == 0)
    {
      ?> <td id=''><img id='img_tb' src="images/logos&stuff/red.png" ></td><?php

    }
    else 
    {
      ?> <td id=''><img id='img_tb' src="images/logos&stuff/green.png" ></td><?php
      
    }
   
  
  
  
    ?>
  
    <!-- <td> <a href=" " data-toggle="modal" data-target="#update_data_Modal"> <i class="far fa-edit"></i></a></td> -->
    <td><button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#verify_product<?php echo $id ?>" >See Documents</button></td>
    <td><a href="php_backend_stuff/admin_backend.php?func=product_approve&id=<?php echo $id ?>"><button class="btn btn-success">Approve</button></a></td>
    <td><a href="php_backend_stuff/admin_backend.php?func=product_reject&id=<?php echo $id ?>"><button class="btn btn-danger">Reject</button></a></td>
    

    <div id="verify_product<?php echo $id ?>" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
  <center><h4 class="modal-title">APPRROVAL DOCUMENTS</h4></center>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
   </div>
   <div class="modal-body">

   <?php
   if(isset($description))
   {
   
   ?>
    <h3>Documents Description</h3>
    

    
   <textarea style="size: 100%; width:100%"><?php echo $description ?></textarea>
   <?php 
   
    for($i=0 ; $i<$count ; $i++ )
   {
    


    ?>
    <div class="row">
      <div class="col-12">
        <img src="<?php echo $verfify[$i] ?>" style=" height: 400px; width: 100%;" /> 
      </div>




    </div>
    <?php
   }}
else 
{
  ?>
  <h3> NO DOCUMENTS SUBMITTED </h3>
<?php
}
?>

   


   </div>
  
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

    <?php
    
    
    echo "</tr>";
  
    }
  
  echo "</table>";
  







    ?>
