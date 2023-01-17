<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=.9, maximum-scale=1 user-scalable=yes">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="icon" href="https://eclipse.market/assets/em_logo.png" type="image/png" sizes="35x35">
<title>Create Your Avatar</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="dist/cropme.min.css">


 
</head>

<body class='has-background-primary-light'>
<nav class="navbar box" role="navigation" aria-label="main navigation">
<div class="navbar-brand">
 <a class="navbar-item has-text-weight-bold is-size-4 is-family-secondary has-text-black" href="./">
Create Your Avatar
</a>
</div>
</nav>

<div class="block">
<div class='container mt-3'>

<div class="columns my-1" id="app">
<div class="column is-6-tablet is-full-mobile">

<div id="cropme"></div>
   
</div>
</div>



<div class='is-centered'>

<div class="file is-primary is-centered is-boxed">
  <label class="file-label">
    <input class="file-input" type="file" name='uploadedFile' id='inputFile'>
    <span class="file-cta">
      <span class="file-icon">
      <ion-icon size="large" name="cloud-upload-outline"></ion-icon>
      </span>
      <span class="file-label">
        Choose your image…
      </span>
    </span>
  </label>
</div>

</div>





<div class='block'>
<div class='mt-5'>
<img id='myImage' src=''>
</div>
<div class="my-4 is-hidden" align='center' id='crop_img'>
<button class="button is-primary is-default is-outlined is-rounded" id="crx">Crop</button>  
</div>
</div>
       

    
</div>
</div>                    
                  

   
<footer class="footer has-background-white">
  <div class="content has-text-centered">
    <p>
   &copy; Phlox, <?= date("Y") ?>
    </p>
  </div>
</footer>   
 
   
   
   
 <!-- Modal -->
<div class="modal" id="cropmeModal">
<div class="modal-background"></div>
<div class="modal-content is-flex is-flex-direction-column is-justify-content-center is-align-items-center">
    <p class="image pb-3">
<img id="cropme-result" src="" class='' alt="cropme">
</p>
<div>
<form method='post' action='ready'>
<input type='hidden' name='img' value='' id='xyz' />
<button type='submit' class="button is-danger is-rounded is-large">Create Avatar</button>
</form>
</div>
</div>
<button class="modal-close is-large" aria-label="close"></button>
</div>
<!-- Modal -->    
   
   
   
   
   
   
   
   
   
   
   
     
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.21/dist/vue.js"></script>
<script src="dist/cropme.min.js"></script>
   
<script>

      

     var xp=   new Vue({
  el: "#app",
  data: {
    options: {},
    position: {},
    defaultOptions: {
      container: {
        width: '70%',
        height: 300,
      },
      viewport: {
        width: 200,
        height: 200,
        type: 'circle',
        border: {
          width: 2,
          enable: true,
          color: '#00C4A7'
        }
      },
      zoom: {
        enable: true,
        mouseWheel: true,
        slider: false
      },
      rotation: {
        slider: false,
        enable: true,
        position: 'left'
      },
      transformOrigin: 'viewport',
    },
    cropme: {},
    el: {}
  },
  watch: {
    options: {
      handler: function(val) {
        this.cropme.reload(val)
      },
      deep: true
    }
  },
  created:function() {
    this.options = JSON.parse(JSON.stringify(this.defaultOptions))
  },

  methods: {
    init:function() {
    
     var element = document.getElementById('myImage');
 this.cropme= new Cropme(element,this.options);
  
    },
    crop:function() {
     let img = document.getElementById('cropme-result')
      this.cropme.crop({
        width: 600
      }).then(function(res) {
        img.src = res
        $("input#xyz").val(res);
       $('#cropmeModal').addClass('is-active');
      })
    
    },
  }
})


 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#myImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
              xp.init();
              $("#crop_img").removeClass('is-hidden');
        }
    }
    
  $("#inputFile").change(function(){
    readURL(this);
  });
  
 $("#crx").click(function(){
xp.crop();
  });
$(".modal-close").click(function(){
$("#cropmeModal").removeClass('is-active');
})        
        
    </script>

</body>

</html>
