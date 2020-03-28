<!DOCTYPE html>
<html>
     <?php
        $title ='Questions/Reponses';
        require_once('includes/header.php');
     ?>
        
    <body>
    <?php 
        require_once('includes/nav-bar.php');
    ?>
		<div class="card responsive-bootstrap-card mx-auto">
			<h5 class="card-header"><img class="picture-user-small" src="profile-picture/lythis.jpg" alt=""> <b>Lythis</b> a posé la question</h5>
			<div class="card-body">
				<h5 class="card-title">Anime</h5>
				<p class="card-text">Pourquoi les waifus ne sont qu'en 2D?</p>
				<a class="btn btn-primary toggle-btn">Afficher les réponses</a>
			</div>
		</div>

		<div class="card hidden-answer responsive-bootstrap-card mx-auto">
		  	<div class="card-body">
			  	<div class="card mb-2">
				  	<div class="card-header">
				    	<img class="picture-user-small" src="profile-picture/leo.jpg" alt=""> <b>Léo</b> a répondu :
				  	</div>
				  	<div class="card-body">
				    	<blockquote class="blockquote mb-0">
				      		<p>?</p>
				      		<footer class="blockquote-footer">Hier à 22h</footer>
				    	</blockquote>
				  	</div>
				</div>
				<div class="card">
				  	<div class="card-header">
				    	<img class="picture-user-small" src="profile-picture/kyllian.jpg" alt=""> <b>Kyllian</b> a répondu :
				  	</div>
				  	<div class="card-body">
				    	<blockquote class="blockquote mb-0">
				      		<p>i like lolis</p>
				      		<footer class="blockquote-footer">Hier à 22h</footer>
				    	</blockquote>
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