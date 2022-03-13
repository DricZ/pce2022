<?php
// if (!isset($_SESSION['username'])) {
//     header("Location: index.php");
//     exit();
// }
include "./phps/include.php";
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>TIME IS UP!</title>
</head>
<body>
   
    <style type="text/css">
        html {
            overflow:hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            align-contents: center;
            height: 100%;
        }
        body {
          text-align:center;
          perspective:100vh;
        }
        .thankyou-container {
            width:100vw;
            height:100vh;
            place-items:center;
            display:grid;
        }
        .thankyou-container h1 {
            background: linear-gradient(to right, #ffdca2, #ff9190, #36d1dc, #5b86e5);
            animation: changeColor 10s infinite;
            color: #000;
            background-clip: text;
            -webkit-background-clip: text;
            text-fill-color: transparent;
            -webkit-text-fill-color: transparent;
            font-size: 45pt;
            background-size:200% auto;
        }

        @keyframes changeColor {
            50% {
                background-position: 100% 0;
            }
        }


    </style>
    <div class="thankyou-container"  id="tilt">
        <div>
            <h1 style="font-size:100pt;">TIME IS UP!</h1>
            <h2>THE GAME HAS ENDED</h2> 
            <h5 style="color:#;opacity:.5;">THANK YOU FOR PLAYING</h5>
        </div>
      </div>
            <!-- <h2 style="text-align: center; font-size: 12pt;margin-bottom:100px;"><a href="http://pce.petra.ac.id/itdivision.php" style="cursor:pointer;text-decoration:none;color:white;">By IT Division Petra Civil Expo 2021 </a></h2> -->
    <script>
        /* Store the element in el */
        let el = document.querySelector('body');
        
        /* Get the height and width of the element */
        const height = window.innerHeight;
        const width = window.innerWidth;
        
        /*
        * Add a listener for mousemove event
        * Which will trigger function 'handleMove'
        * On mousemove
        */
        window.addEventListener('mousemove', handleMove);

        /* Define function a */
        function handleMove(e) {
        /*
            * Get position of mouse cursor
            * With respect to the element
            * On mouseover
            */
        /* Store the x position */
        const xVal = e.pageX;
        /* Store the y position */
        const yVal = e.pageY;
        
        /*
            * Calculate rotation valuee along the Y-axis
            * Here the multiplier 20 is to
            * Control the rotation
            * You can change the value and see the results
            */

        const yRotation = ((xVal - width / 2) / width);
        
        /* Calculate the rotation along the X-axis */
        const xRotation = -1 * ((yVal - height / 2) / height);

        const moveY = width / 2 * xRotation;
        const moveX = -height / 2 * yRotation;

        /* Generate string for CSS transform property */
        const string = 'scale(1.1) rotate3d('+ xRotation +','+ yRotation +',0,30deg)' + ' translate('+ moveX +'px,'+ moveY +'px)';
        
        /* Apply the calculated transformation */
        document.querySelector('#tilt').style.transform = string;
        }

        // /* Add listener for mouseout event, remove the rotation */
        // el.addEventListener('mouseout', function() {
        // el.style.transform = 'perspective(500px) scale(1) rotateX(0) rotateY(0)';
        // })

        // /* Add listener for mousedown event, to simulate click */
        // el.addEventListener('mousedown', function() {
        // el.style.transform = 'perspective(500px) scale(0.9) rotateX(0) rotateY(0)';
        // })

        // /* Add listener for mouseup, simulate release of mouse click */
        // el.addEventListener('mouseup', function() {
        // el.style.transform = 'perspective(500px) scale(1.1) rotateX(0) rotateY(0)';
        // })
    </script>
</body>
</html>