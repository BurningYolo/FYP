<?php
session_start(); 
if(isset($_SESSION['session']))
{
    $id=$_SESSION['session']; 
}
include("head.php"); 
?>
<style>

.login_success
{
    
        background-color: green;
        color: white;
        width: 100%;
        height: auto;
        text-align: center;
        position: absolute;

        

}
</style>
<?php
if(isset($_GET['login_success']))
{
    ?>
    <div class="login_success" id="login_success">
    <p>Logged In</p>

</div>
    <?php
    unset($_GET['login_sucess']); 
}

?>