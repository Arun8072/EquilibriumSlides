<!-- 21-2-2021-11pm-1pm / mon-1hr / tue-11pm-1am/ wed 1h/ thu 1hr / -->

<html>
  <head>
  <title>My New Amazing Webpage</title>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>  
  <!--cdn-->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  
 <style>
body{
  background:#ccc;
}
.slider-nav{
  height:95px;
  width: 84%;
  justify-content:center;
  margin:8%;
}
h3 {
    background: #fff;
    color: #3498db;
    font-size: 36px;
    line-height: 80px;
    margin: 5px;
    padding: 2%;
    position: relative;
    text-align: center;
    height:80px;
}
.fullscreen:-webkit-full-screen {
      width: auto !important;
      height: auto !important;
      margin:auto !important;
}
.fullscreen:-moz-full-screen {
     width: auto !important;
    height: auto !important;
    margin:auto !important;
}
.fullscreen:-ms-fullscreen {
    width: auto !important;
    height: auto !important;
    margin:auto !important;
}     
 
@media screen and (orientation: portrait){ 
  .slider-for{
    height:200px;
  }
}
</style>
  </head>
  
  <body>
 
     <script>
        function makeFullScreen() {
         var divObj = document.getElementById("slide");
       //Use the specification method before using prefixed versions
      if (divObj.requestFullscreen) {
        divObj.requestFullscreen();
      }
      else if (divObj.msRequestFullscreen) {
        divObj.msRequestFullscreen();               
      }
      else if (divObj.mozRequestFullScreen) {
        divObj.mozRequestFullScreen();      
      }
      else if (divObj.webkitRequestFullscreen) {
        divObj.webkitRequestFullscreen();       
      } else {
        console.log("Fullscreen API is not supported");
      } 

    }
     </script>

  <div class="slider-for fullscreen"  id="slide" style="width:auto;" onClick="makeFullScreen()" >
<?php
 $num = count(glob("presentation/" . "*")); 
 for ( $x = 1 ; $x <= $num; $x++) {
  echo "<img src = \"presentation/Slide".$x.".PNG\" alt = \"Slide".$x."\" />  \n";
 }
?>
  </div>
  <div  class="slider-nav " >
<?php
 for ( $x = 1 ; $x <= $num; $x++) {
   echo "<div><h3>".$x."</h3></div> \n";
 }
?>    
  </div>

  
  <script type="text/javascript" src="slick/slick.js"></script> 
  <script type="text/javascript" src="slick/slick.min.js"></script> 
  <!--cdn-->
 <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
 <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>  
 <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script type = "text/javascript" >

 $(document).ready(function () {

 //sync
$('.slider-for').slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   arrows: false,
   cssEase:'ease',
   dots:false,
   focusOnSelect:false,
   focusOnChange:false,
   infinite:false,
   
   fade: true,
   asNavFor: '.slider-nav'
 });
 $('.slider-nav').slick({
   slidesToShow: 3,
   slidesToScroll: 1,
   asNavFor: '.slider-for',
   dots: false,
   focusOnSelect: true,
   focusOnChange:false,
   mobileFirst:true,
   arrows:true
 });
 
 $('.slider-for').on('afterChange',
 function(slick, currentSlide){ 
 // var inf = currentSlide.values();
 // index of current slide
 var currentslide = $('.slider-for').slick('slickCurrentSlide')  ;
 // alert("before write:"+currentslide);
  $.ajax({
    type: "POST",
    url: 'write-slide.php',
    data:{currentslide:currentslide},
    success: function(data){
  //  alert("after write:"+currentslide);
      //consolelog success - show greentick
    }//suc
    });//aj
 }); 
 
 //check every second what is the current slide  and change
 //nested timeout
let getSlide = setTimeout( 
function changeSlide() {
 //alert('tick');
  $.ajax({
    type: "POST",
    url: 'read-slide.php',
    success: function(data){
        //  alert("after read:"+data);
             $('.slider-for').slick('slickGoTo',data,0); 
    }//suc
    });//aj
    
 //recursion
  // getSlide = setTimeout(changeSlide, 1000); 
 getSlide = setTimeout(changeSlide, 800); 
 }, 800);
 
 }); //doc ready 
 
 
 // future scope- update to 
 // now it just display images
 // update it to show a ppt slide  y using api
 // to refer use below link
 // https://docs.microsoft.com/en-us/office/dev/add-ins/reference/overview/powerpoint-add-ins-reference-overview
 
</script>

  </body>
</html>