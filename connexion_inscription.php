<?php
    require_once('db/base_PDO.php');
    $title ='Connexion/Inscription';
    require_once('includes/header.php');

    // root@livequestion.com 12345
    if (!empty($_POST['email']) && !empty($_POST['mdp']) && isset($_POST['connexion']) && $_POST['connexion'] == 'valide') {

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

    elseif (!empty($_POST['pseudoinscription']) && !empty($_POST['emailinscription']) && !empty($_POST['mdpinscription']) && !empty($_POST['mdpinscriptionconfirm']) && $_POST['mdpinscriptionconfirm'] == $_POST['mdpinscription'] && isset($_POST['inscription']) && $_POST['inscription'] == 'valide') {

        $query = $con->prepare('INSERT INTO profil (Pseudo_profil, Mail_profil, MotDePasse_profil, Genre_profil, `#Id_role`) VALUES (:pseudo, :email, :password, :genre, :role)');
        $query->bindParam(':pseudo', $_POST['pseudoinscription']);
        $query->bindParam(':email', $_POST['emailinscription']);
        $query->bindParam(':password', $_POST['mdpinscription']);
        $query->bindParam(':genre', $genre);
        $query->bindParam(':role', $role);
        $genre = 'Homme';
        $role = 2;
        $query->execute();

    }
?>

<body>
    <?php 
        require_once('includes/nav-bar.php');
    ?>
    <body class="inscription">
        <?php
            if (!empty($_POST['email']) && !empty($_POST['mdp']) && isset($_POST['connexion']) && $_POST['connexion'] == 'valide') {

                $_POST['connexion'] = '';

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

            elseif (!empty($_POST['pseudoinscription']) && !empty($_POST['emailinscription']) && !empty($_POST['mdpinscription']) && !empty($_POST['mdpinscriptionconfirm']) && $_POST['mdpinscriptionconfirm'] == $_POST['mdpinscription'] && isset($_POST['inscription']) && $_POST['inscription'] == 'valide') {

                $_POST['inscription'] = '';

                echo "Vous avez bien été enregistré.";

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
                            <button type="submit" class="btn btn-primary" name="connexion" value="valide">Envoyer</button>
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
                                        <form action="connexion_inscription.php" method="post">
                                            <div class="form-group">
                                                <label for="InputPseudo">Pseudo</label>
                                                <input type="text" class="form-control" id="pseudo" aria-describedby="pseudoHelp" placeholder="" name="pseudoinscription">
                                                <small id="pseudoHelp" class="form-text text-muted"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputEmail1">Adresse Mail</label>
                                                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="" name="emailinscription">
                                                <small id="emailHelp" class="form-text text-muted"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputPassword1">Mot de passe</label>
                                                <input type="password" class="form-control" id="InputPassword1" placeholder="" name="mdpinscription">
                                            </div>
                                            <div class="form-group">
                                                <label for="InputPassword1">Confirmer votre mot de passe</label>
                                                <input type="password" class="form-control" id="InputPassword1" placeholder="" name="mdpinscriptionconfirm">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary" name="inscription" value="valide">Inscription</button>
                                        </div>
                                    </form>
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


    </body>
    </html>
