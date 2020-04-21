<body class="font-page">
    <body class="inscription">
        <?php
            if (isset($connexion) && $connexion == true) {
                $_POST['connexion'] = '';
            
                if ($connexionvalide == true) {
        ?>
                    <div class="pCard">
                        <div class="card-body">
                            <p class="card-text"><img src="image/check.gif" style="width: 48%; margin-right: 6%;" class="" alt="pouve en l'air">Bienvenue <?php echo $_SESSION['utilisateur']['pseudo']; ?> !</p>
                        </div>
                    </div>
            <?php
                }
                
                else {
            ?>
                    <div class="pCard">
                        <div class="card-body" style="display: flex;">
                            <p class="card-text"> <img src="image/tenor.gif" style="  width: 75%; margin-right: 6%;" class="" alt="facher"><h6>Nom d'utilisateur ou mot de passe erroné.<a href="connexion_inscription.php">Revenir en arrière</a>.</h6></p>
                        </div>
                    </div>
            <?php
                }
                
            }
        
        elseif (isset($creationreussi) && $creationreussi == true) {
            $_POST['inscription'] = '';

        ?>
            <div class="pCard">
                <div class="card-body" style="display: flex;">
                    <p class="card-text"> <img src="image/welcome.gif" style=" width: 90%;  margin-right: 6%;" class="" alt="bienvenue"><h6>Vous avez bien été enregistré. Bienvenue chez LiveQuestion! <a href="./connexion_inscription.php">Se connecter</a>.</h6></p>
                </div>
            </div>
        
        <?php    
        }
        
        else {
            require_once('./includes/connexion_inscription.php');
        }
        ?>