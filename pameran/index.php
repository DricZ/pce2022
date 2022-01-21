<!DOCTYPE html> 
<html> 
<body> 

<button onclick="pauseVid()" type="button">Pause Video</button><br> 

<video id="myVideo" width="320" height="176" onclick="playVid()">
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
