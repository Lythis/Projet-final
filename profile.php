<?php
$title ='Profile';
require_once('includes/header.php');
?>

<body>
    <?php 
    require_once('includes/nav-bar-login.php');
    ?>
    <div class="profil">
    <div class="card responsive-bootstrap-card  mx-5">
        <div class="row_ligne card_profil card-header">
            <div class="container_profil">
                <div class="col-3">
                    <img class=" rond_profil float-left img-fluid mr-4" src="https://i.pinimg.com/236x/1b/50/3b/1b503bafe77169ec44e0080964bb6e51.jpg" alt="">
                </div>	    
                <div class="col  ">
                <div class="profil_information"> 
                    <h3 class="card-title ml-2">Lythis</h3>
                    <h5>Genre : non-binaire</h5>
                </div>
                <div class="profil_description">
                    <h3> Desciption personelle: </h3>
                    <p>Je suis un dévelopeur full-stack.</p>
                    <p>Nombre de post : 6 </p>
                </div>
                </div>
            </div>
            <div class="row_ligne card-body">
            </div>
        </div>
    </div>
    <p class="titre_post">
        Post-Recent de 
    </p>
    <div class="card">
        <div class="card-header">
            Quote
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
        </div>
    </div>
    </div>
     <div class="bas-page">
        <?php
       
        ?>
    </div>

</html>