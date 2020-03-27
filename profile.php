<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Profil de Lythis</title>
	</head>
	<body>
		<?php
			require_once('includes/nav-bar.php'); 
		?>
		<div class="card responsive-bootstrap-card mx-5">
			<div class="row_ligne card-header">
				<div class="container_profil">
			    	<div class="col-3">
			      			<img class="rounded float-left img-fluid mr-4" src="https://i.pinimg.com/236x/1b/50/3b/1b503bafe77169ec44e0080964bb6e51.jpg" alt="">
			    	</div>	    
			    	<div class="col ">
			      		<h3 class="card-title ml-2">Lythis</h3>
			  			<h5>Genre : Homme</h5>
			  			<p>Description personnelle : Je suis un dévelopeur full-stack.</p>
			    	</div>

				</div>
				<div class="row_ligne card-body">
			  		<div class="col">
			    		<h5 class="card-title ">Questions posées par Lythis :</h5>
			    		<p class="card-text">Wow, such empty.</p>
			  		</div>
			  	</div>
			</div>
		</div>
	<?php 
	require_once('./includes/footer.php');

	?>
	</body>
	<script src="https://kit.fontawesome.com/6c2421ea48.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="reponses.js"></script>
</html>