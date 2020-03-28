<!DOCTYPE html>
<html>
    <?php
        $title ='Question';
        require_once('includes/header.php');
    ?>
        
    <body>
    <?php 
        require_once('includes/nav-bar.php');
    ?>
		<div class="center">
			<div class="form-group">
			    <label for="votrequestion" class="lead">Votre question :</label>
			    <textarea class="form-control mb-2 w-100" id="votrequestion" rows="2"></textarea>
			    <div class="invalid-feedback mb-2">
			        Veuillez saisir une question.
			    </div>
			    <button type="submit" class="btn btn-success">Envoyer</button>
			</div>
		</div>
		<?php
			require_once('./includes/footer.php');
		?>


	</body>
	<script src="https://kit.fontawesome.com/6c2421ea48.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>