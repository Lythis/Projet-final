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
    <div class="bas-page">
        <?php
        require_once('includes/footer.php');
        ?>
    </div>
</body>
</html>
