<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>
		window.location.href = '/main';
	</script>
	<style>
		body {
			background-image: url("large-malam.jpg");
			/*background-color: #F6F7F9;*/
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment: fixed;
			background-position: center;
			color: black;
			/*      overflow-y: hidden !important;*/
			min-height: 100vh;
			padding-top: 5rem;
		}

	@media (max-width: 480px) { 
        #desktop { display: none;}
    } 
	@media (min-width: 768px) { 
		#mobile { display: none;} 
    } 
	</style>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container">
			<div class="col-md-12 col-sm-12 text-center">
				<h1 style="color: white;">Please Turn on Javascript, <br>then press F5 / refresh your page!</h1>

			</div>
	</div>
	<br>
	<center><video width="1280" height="720" controls id="desktop">
		  <source src="js_desktop.mp4" type="video/mp4">
		</video></center>
	<center><video controls id="mobile">
		  <source src="js_mobile.mp4" type="video/mp4">
		</video></center>
</body>
</html>