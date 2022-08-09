<?php 

include("admin_head.php") ; 

$id = $_GET['data'];


$sql="SELECT * FROM user_info WHERE id='$id' ";
$x=(mysqli_query($conn,$sql));
while($row=mysqli_fetch_array($x))
{
    $name = $row['name']; 
    $email = $row['email']; 
    $mobile = $row['mobile']; 
    $image = $row['image']; 
    $details = $row['details']; 


    
    
}


?>


<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
    <form id="update_form" action="php_backend_stuff/admin_backend.php?func=update" method="post" enctype="multipart/form-data">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><input type="image" class="rounded-circle mt-5" width="150px" src="<?php echo $image ?>"><span class="font-weight-bold"><?php echo $name ?></span><span class="text-black-50"><?php echo $email ?></span><span><label class="input_image" for="img">Change Picture</label><input name="img" type="file"  value="<?php echo $image ?>"accept="image/png, image/gif, image/jpeg" id ="img" hidden  ></span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4  style="color: green;"class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">UserName<span id="username_error"></span></label><input type="text" class="form-control" name="username" id="username" placeholder="enter UserName" value="<?php echo $name ?>" required></div>
                    <div class="col-md-12"><label class="labels">Email<span id="email_error"></span></label><input type="email" class="form-control" name="email" id="email" placeholder="enter Email" value="<?php echo $email?>" required></div>
                    <div class="col-md-12"><label class="labels">Mobile No. <span id="mobile_error"></span></label><input type="tel" pattern="[0-3]{2}[0-9]{9}" name="mobile" class="form-control" id="mobile" required placeholder="03xxxxxxxxx" value="<?php echo $mobile?>" ></div>
                    <input type="text" name="id" value="<?php echo $id ?>" hidden ?>
                </div>
                <div class="mt-5 text-center"><input class="btn btn-primary profile-button" value="Update" type="submit"></input></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">

                <div class="col-md-12"><label class="labels">Additional Details</label><textarea rows="5" type="text" class="form-control" id="details" name="details" placeholder="additional details" value="<?php echo $details ?>"><?php echo $details ?></textarea>
            </div>
    </form>
        </div>
    </div>
</div>
</div>
</div>