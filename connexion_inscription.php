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
            $_SESSION['utilisateur'] = [
                'id' => $profil[$ind]['Id_profil'],
                'email' => $profil[$ind]['Mail_profil'],
                'pseudo' => $profil[$ind]['Pseudo_profil'],
                'genre' => $profil[$ind]['Genre_profil'],
                'image' => $profil[$ind]['Image_profil'],
                'role' => $profil[$ind]["#Id_role"],
            ];
        }
        else {
            $ind = $ind + 1;
        }

    }
}

elseif (!empty($_POST['pseudoinscription']) && !empty($_POST['emailinscription']) && !empty($_POST['mdpinscription']) && !empty($_POST['mdpinscriptionconfirm']) && $_POST['mdpinscriptionconfirm'] == $_POST['mdpinscription'] && isset($_POST['inscription']) && $_POST['inscription'] == 'valide') {

    $query = $con->prepare('INSERT INTO profil (Pseudo_profil, Mail_profil, MotDePasse_profil, Genre_profil, Image_profil, Description_profil, `#Id_role`) VALUES (:pseudo, :email, :password, :genre, :image, :description, :role)');
    $query->bindParam(':pseudo', $_POST['pseudoinscription']);
    $query->bindParam(':email', $_POST['emailinscription']);
    $query->bindParam(':password', $_POST['mdpinscription']);
    $query->bindParam(':genre', $_POST['genreInscription']);
    $query->bindParam(':image', $image_default_profil);
    $query->bindParam(':description', $description_default_profil);
    $query->bindParam(':role', $role);
    $image_default_profil = "Default.png";
    $description_default_profil = "Aucune information disponible.";
    $role = 2;
    $query->execute();
}
?>

<body class="font-page">
    <?php 
    require_once('includes/nav-bar.php');
    ?>
    <body class="inscription">
        <?php
        if (!empty($_POST['email']) && !empty($_POST['mdp']) && isset($_POST['connexion']) && $_POST['connexion'] == 'valide') {

            $_POST['connexion'] = '';

            if ($connexionvalide == true) {
                echo "Bienvenue ".$_SESSION['utilisateur']['pseudo']." !";
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
                <div class="card4">
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
                            <button type="submit" class="btn2 btn-primary" name="connexion" value="valide">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card4-2">
                    <div class="card-body">
                        <h5 class="card-title">Pas de compte? Alors inscris toi!</h5>
                        <p class="card-text">Inscris toi afin de poser des questions.</p>
                        <button type="button" class="btn2 btn-primary" data-toggle="modal" data-target="#inscription">
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
                                        <form class="needs-validation" novalidate action="connexion_inscription.php" method="post">

                                            <div class="form-row1">
                                                <div class=" mb-3">
                                                    <label for="validationCustom01">Pseudo</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="pseudoinscription" required>
                                                    <div class="invalid-feedback">
                                                        Veuillez entrer votre pseudo.
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <label for="validationCustom02">Adresse Email</label>
                                                    <input type="email" class="form-control" id="validationCustom02" placeholder="" name="emailinscription" required>
                                                    <div class="invalid-feedback">
                                                        Veuillez entrer un email valide.
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <label for="validationCustomMDP">Mot de passe</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" id="validationCustomMDP" placeholder="" aria-describedby="inputGroupPrepend" name="mdpinscription" required>
                                                        <div class="invalid-feedback">
                                                            Veuillez entrer un mot de passe valide.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <label for="validationCustomMDP">Confirmation mot de passe</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" id="validationCustomMDP" placeholder="" aria-describedby="inputGroupPrepend" name="mdpinscriptionconfirm" required>
                                                        <div class="invalid-feedback">
                                                            Veuillez saisir le même mot de passe.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                <label for="validationTooltip02">Genre :</label>
                                                <select class="custom-select mb-2" id="validationTooltip02" placeholder="Genre" name="genreInscription" required>
                                                    <option value="">Selectionner une catégorie</option>
                                                    <option value="Homme">Homme</option>
                                                    <option value="Femme">Femme</option>
                                                    <option value="Non-binaire">Non-binaire</option>
                                                    <option value="Hélicoptère d'attaque">Hélicoptère d'attaque</option>
                                                </select>
                                                <div class="invalid-feedback mb-2">
                                                    Veuillez sélectionner un genre.
                                                </div>
                                                    </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary" name="inscription" value="valide">Inscription</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
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