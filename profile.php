<?php
$title ='Profile';
require_once('includes/header.php');
?>

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
                    <h5>Genre : non-binaire</h5>
                    <p>Description personnelle : Je suis un dévelopeur full-stack.</p>
                </div>
            
            </div>
            <div class="row_ligne card-body">
            </div>
        </div>
    </div>
    <h2 class="titre_post">
        Post-Recent
     </h2>

     <div class="bas-page">
        <?php
        require_once('includes/footer.php');
        ?>
    </div>
</html>