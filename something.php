
    <?php
     include("loader.php") ; 
session_start(); 
if(isset($_SESSION['session']))
{
    $id=$_SESSION['session']; 
}
include("head.php"); 
$to=$_GET['to']; 
$sql="Select * from user_info where id = '$id'"; 
$result=(mysqli_query($conn,$sql));
while($row = mysqli_fetch_array($result))
{
    $id_image = $row['image']; 
    $id_name = $row['name']; 
    $id_email=$row['email']; 
   
}
$sql="Select * from user_info where id = '$to'"; 
$result=(mysqli_query($conn,$sql));
while($row = mysqli_fetch_array($result))
{
    $to_image = $row['image']; 
    $to_name = $row['name']; 
    $to_email=$row['email']; 
    $to_description=$row['details']; 
    $to_mobile = $row['mobile']; 
  
}



?>
<style>
body {
    background: #B0BEC5; 
  
}
.card{
  width: 600px;
  border: none;
  border-radius: 10px;
   
  background-color: #fff;
}



.stats{

      background: #f2f5f8 !important;

    color: #000 !important;
}
.articles{
  font-size:10px;
  color: #a1aab9;
}
.number1{
  font-weight:500;
  height: fit-content;
  width: 99%;
}
.followers{
    font-size:10px;
  color: #a1aab9;

}
.number2{
  font-weight:500;
}
.rating{
    font-size:10px;
  color: #a1aab9;
}
.number3{
  font-weight:500;
}
</style>

<div id="chat_modal"  class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">

  <center><h4 id="NAME" class="modal-title">Chat</h4></center>  
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>



   <div class="modal-body">
   <div id="talkjs-container" style="width: 90%; margin: 30px; height: 500px">
      <i>Loading chat...</i>
    </div>


 
   
  
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
</div>


<div class="container mt-5 d-flex justify-content-center">

            <div class="card p-3">

                <div class="d-flex align-items-center">

                    <div class="image">
                <img src="<?php echo $to_image ?>" class="rounded-circle"  width="155" height="100" >
                </div>

                <div class="ml-3 w-100">
                    
                   <h4 class="mb-0 mt-0"><?php echo $to_name ?></h4>
                   <span><?php echo $to_email ?></span>

                   <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                
                    <div class="d-flex flex-column">

                  

                    

                        <span class="articles">Description</span>
                        <span class="number1"><?php echo $to_description ?></span>
                        
                    </div>
              

                  

                    


             
                   </div>
                   <div class="p-2 mt-2 bg-primary d-flex  rounded text-white stats ">

              
                    <div class="d-flex flex-column" style="width: 100%;">

                  

                    

                        <span class="articles">Mobile no.</span>
                        <span class="number1"><?php echo $to_mobile ?></span>
                        
                    </div>
                 
                  
               
        
<?php
                  
                    
     ?>   
                   </div>



                   <div class="button mt-2 d-flex flex-row align-items-center">
                    <?php
                    if($to != $id)
                    { 
                    ?>

                   <button class="btn btn-sm btn-success w-100  "    data-toggle="modal" data-target="#chat_modal"  id="chat_user type="button">Chat</button>
                   <?php 
                    }

                   ?>
                   <button class="btn btn-sm btn-outline-success w-100" onclick="show_details()">Product Listed</button>

                       
                   </div>


                </div>

                    
                </div>
                
            </div>
             
         </div>



<div class="container mt-5 mb-5" hidden id="product_div">
<div class="d-flex justify-content-center row" >
<div class="col-md-10">
            <div class="row p-2 justify-content-center bg-white border rounded" >
              <h2>Products Listed by <?php echo $to_name ?></h2>
            </div>

</div>

     
    
</div>
<?php 
$i = 0 ; 
$sql="Select * from product_info where user_id = '$to'"; 
$result=(mysqli_query($conn,$sql));
while($row = mysqli_fetch_array($result))
{
    $product_name = $row['name']; 
    $product_address = $row['address']; 
    $product_location = $row['location']; 
    $product_description = $row['description']; 
    $product_starting_price = $row['start_price']; 
    $product_id = $row['id']; 

    $sql1="Select * from product_images where product_id = '$product_id' Limit 1"; 
    $result1=(mysqli_query($conn,$sql1));
    while($row1 = mysqli_fetch_array($result1))
    {
        $product_image = $row1['image']; 
    }
    $i++ ; 


?>
<form action="product_page.php?search_result=<?php echo $product_id ?>" method="POST">
    <div class="d-flex justify-content-center row" >
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded" >
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" style="height: 159px; width:200px"  src="<?php echo $product_image ?>"></div>
                <div class="col-md-6 mt-1">
                    <h5><?php echo $product_name ?></h5>
                    <div class="d-flex flex-row">
                     <span><?php echo $product_description ?></span>
                    </div>
                    <br>
                    <div class="mt-1 mb-1 spec-1"><span><?php echo $product_location?></span><span class="dot"></span></div>
                    <div class="mt-1 mb-1 spec-1"><span><?php echo $product_address ?></span><span class="dot"></span></div>                   
                     
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1" style="color: green;"><?php echo $product_starting_price ?>rs</h4>
                    </div>
                    <h6 class="text-success">Bid now </h6>
                    <div class="d-flex flex-column mt-4"><button class="btn btn-success btn-sm" type="submit">Details</button>
                </div>
            </div>
        
        </div>
    </div>
    </form>
</div>

<?php 
}
if($i == 0 )
{
  ?>

  <span class="no_products">
   <center> <h4 style="color:red"> User has not listed any products </h4></center>
  </span>

  <?php
}
?>



<script>
(function(t,a,l,k,j,s){
    s=a.createElement('script');s.async=1;s.src="https://cdn.talkjs.com/talk.js";a.head.appendChild(s)
    ;k=t.Promise;t.Talk={v:3,ready:{then:function(f){if(k)return new k(function(r,e){l.push([f,r,e])});l
    .push([f])},catch:function(){return k&&new k()},c:l}};})(window,document,[]);
    Talk.ready.then(function () {

        var me = new Talk.User({
          id: '<?php echo $id ?>',
          name: '<?php echo $id_name ?>',
          email: '<?php echo $id_email ?>',
          photoUrl: '<?php echo $id_image ?>',
          
        });
        window.talkSession = new Talk.Session({
          appId: 'tq052jvx',
          me: me,
        });
        var other = new Talk.User({
          id: '<?php echo $to ?>',
          name: '<?php echo $to_name ?>',
          email: '<?php echo $to_email ?>',
          photoUrl: '<?php echo $to_image?>',
        });
      
        var conversation = talkSession.getOrCreateConversation(
          Talk.oneOnOneId(me, other)
        );
        conversation.setParticipant(me);
        conversation.setParticipant(other);
      
        var chatbox = window.talkSession.createChatbox();
        chatbox.select(conversation);
        chatbox.mount(document.getElementById('talkjs-container'));
      });
  
    


</script>

<script>
  function show_details()
  {
    document.getElementById("product_div").hidden=false; 
  }

  </script>


