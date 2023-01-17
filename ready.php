<?php
if(isset($_POST['img']) && !empty($_POST['img'])){
$pic=$_POST['img'];
}else{?>
<script>window.location.href="./";</script>
<?php
}
?>
<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=.8, maximum-scale=.8 user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Create Your Avatar</title>
 <link rel="icon" href="https://eclipse.market/assets/em_logo.png" type="image/png" sizes="35x35">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head> 

<body class='has-background-primary-light'> 
<nav class="navbar box" role="navigation" aria-label="main navigation">
<div class="navbar-brand">
<a class="navbar-item has-text-weight-bold is-size-4 is-family-secondary has-text-black" href="./">
Create Your Avatar
</a>
</div>
</nav>

<div class='container mt-4' align='center'>

<div class='columns is-centered'>
<div class='column is-6-tablet is-full-mobile'>
<div class="card">
<header class="card-header">
<p class="card-header-title">
Your avatar is ready
</p>
</header>
<div class="card-content">
<div class="content ">
<canvas id="myCanvas" width="400"  height='300'></canvas>
</div>
</div>

<footer class="card-footer">
<a class="card-footer-item" id='xyz' download>
<button id="download" type="button" class="button is-primary">
Download <ion-icon name="cloud-download-outline" size='large' class='pl-2'></ion-icon></button>
</a>
<a href="javascript:history.back()" class="card-footer-item">
<button type="button" class="button is-warning">Edit my picture <ion-icon name="create-outline" size='large' class='pl-2'></ion-icon></button>
</a>
</footer>
</div>
</div>
</div>

</div>


<img id="selfie" src="<?= $pic  ?>" alt="YOU" style="display:none;">
<img id="bckgrnd" src="bg.jpg" alt="BACKGROUND" width="0" height="0">
<canvas id="myCanvas2" width="1038" height='720' style="display:none;"></canvas>
<div id="img" style="display:none;"></div>


<footer class="footer has-background-white">
  <div class="content has-text-centered">
    <p>
   &copy; Phlox, <?= date("Y") ?>
    </p>
  </div>
</footer>  

<script src="dist/canvas2image.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
</script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
	
<script>
window.onload = function() {
var img = document.getElementById("selfie");
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
var img2 = document.getElementById("bckgrnd");

ctx.drawImage(img2, 0,0 ,400, 273);
ctx.drawImage(img, 16, 85, 98, 98);
       
var c2 = document.getElementById("myCanvas2");
var ctx2 = c2.getContext("2d");
var img3 = document.getElementById("bckgrnd");

ctx2.drawImage(img3, 0,0 ,1038, 720);
ctx2.drawImage(img, 41, 226, 255, 255);
};
</script>


<script> 
$(function(){
$("#download").click(function(){
var c = document.getElementById("myCanvas2");
$("#img").append(Canvas2Image.convertToImage(c, 1038, 720, 'jpeg'));
var myDiv = $("#img > img").attr('src');
$("#xyz").attr('href',myDiv)
});
}); 
</script> 

</body> 

</html> 
