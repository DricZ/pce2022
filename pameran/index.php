
<html> 

<body> 

<button onclick="pauseVid()" type="button">Pause Video</button><br> 

<!-- 
    1. mode awal autoplay, kita ubah 
 -->

<video id="myVideo" autoplay="autoplay" muted="muted" id="header-video" style="
         width: 100%;
         height: 100%;
         position: absolute;
         top:  0;
         left: 0;
         object-fit: cover;
      " onclick="playVid()">
  <source src="video/1.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>

<script> 
var vid = document.getElementById("myVideo"); 

function playVid() { 
  vid.play(); 
} 

function pauseVid() { 
  vid.pause(); 
} 
</script> 

<p>Video courtesy of <a href="https://www.bigbuckbunny.org/" target="_blank">Big Buck Bunny</a>.</p>

</body> 
</html>
