<body class="bgP">
<?php
    if(isset($todelete) && $success == true) {
?>

    <div class="card d-flex">
        <div class="card-body ">
            <img src="image/sad2.gif" class="card-img-top w-50" alt="triste">
            <p class="card-text float-right pl-3 w-50">Suppression réussi. <a href="index.php">Revenir à l'accueil</a>.</p>
        </div>
    </div>

<?php
    }
    else {
?>

        <div class="card">
            <div class="card-body" style="display: flex;">
                <p class="card-text"> <img src="image/tenor.gif" style="  width: 75%;
                margin-right: 6%;" class="" alt="facher">
                <p>Accès refusé. <a href="index.php">Revenir à l'accueil</a>.</p>
            </div>
        </div>

<?php
    }
    footer($_SESSION)
?>
