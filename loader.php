<?php 
 include("libraries.php") ; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .pager{
            height: 100%;
            position: absolute;
            width: 100%;

            background-color: rgb(227, 227, 227);
            z-index: 100000;


        }
        
    </style>
</head>
<body>
    <div class="pager" id="pager">
      
    <center> <div class="spinner-border text-success" style="height: 300px; width:300px ; margin-top: 150px; " role="status"> </div>

<img src="images/logos&stuff/easy_auction1.png"  style="height:300px ; margin-top:-200px ; position:absolute ;left:40% ; top:40%">


</div>
</body>
</html>

<script>
    $(function() {
       var x =  Math.floor(Math.random() * 3000) + 1000;
       console.log("Time : " + x)

    setTimeout(function() { $("#pager").fadeOut(1500); }, x)
    
        
    })
</script>