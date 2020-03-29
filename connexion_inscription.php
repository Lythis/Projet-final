<?php
    require_once('db/base_PDO.php');
    $title ='Connexion/Inscription';
    require_once('includes/header.php');

    // root@livequestion.com 12345
    if (!empty($_POST['email']) && !empty($_POST['mdp'])) {

        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $query = $con->prepare("SELECT * FROM profil");
        $query->execute();
        $profil = $query->fetchAll();

        $ind = 0;
        $connexionvalide = false;

        while ($ind < count($profil) && $connexionvalide == false) {

            if($profil[$ind]['Mail_profil'] == $email && $profil[$ind]['MotDePasse_profil'] == $mdp) {
                $connexionvalide = true;
            }
            else {
                $ind = $ind + 1;
            }

        }

        if ($connexionvalide == true) {
            $_SESSION['pseudo'] = $profil[$ind]['Pseudo_profil'];
        }
    }
?>

<body>
    <?php 
        require_once('includes/nav-bar.php');
    ?>
    <body class="inscription">
        <?php
            if (!empty($_POST['email']) && !empty($_POST['mdp'])) {

                if ($connexionvalide == true) {
                    echo "Bienvenue ".$_SESSION['pseudo']." !";
                }

                else {
                ?>

                <p>Nom d'utilisateur ou mot de passe erroné.</p>
                <p><a href="connexion_inscription.php">Revenir en arrière</a></p>

                <?php
                }

            }

            else {
        ?>
        <div class="rowe2">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Connexion</h5>
                        <form action="connexion_inscription.php" method="post">
                            <div class="form-group">
                                <label for="InputEmail1">Adresse mail</label>
                                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="" name="email">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Mot de passe</label>
                                <input type="password" class="form-control" id="InputPassword1" placeholder="" name="mdp">
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pas de compte? Alors inscris toi!</h5>
                        <p class="card-text">Inscris toi afin de poser des questions.</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inscription">
                            Inscription
                        </button>

                        <!--
                        Test afin de vérifier qu'on est bien connecté à la base de données
                        <?php
                            $query = $con->prepare("SELECT * FROM profil");
                            $query->execute();
                            $users = $query->fetchAll();

                            var_dump($users)
                        ?>
                        -->

                        <!-- Modal -->
                        <div class="modal fade" id="inscription" tabindex="-1" role="dialog" aria-labelledby="inscriptionLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="inscriptionLabel">Page inscription</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="InputPseudo">Pseudo</label>
                                                <input type="email" class="form-control" id="pseudo" aria-describedby="pseudoHelp" placeholder="">
                                                <small id="pseudoHelp" class="form-text text-muted"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputEmail1">Adresse Mail</label>
                                                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="">
                                                <small id="emailHelp" class="form-text text-muted"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputPassword1">Mot de passe</label>
                                                <input type="password" class="form-control" id="InputPassword1" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="InputPassword1">Confirmer votre mot de passe</label>
                                                <input type="password" class="form-control" id="InputPassword1" placeholder="">
                                            </div>


                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Inscription</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>

        <div class="bas-page">
            <?php
                require_once('includes/footer.php');
            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/6c2421ea48.js" crossorigin="anonymous"></script>


    </body>
    </html>
