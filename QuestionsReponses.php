<?php
    require_once('fonctions/fonctions.php');
    $dontstartsession = true;
    session_start();

    if(estConnecte($_SESSION['utilisateur']) == true) {
        require_once('db/base_PDO.php');
        $con = connexionBdd();

        if(!empty($_GET['question'])) {
            $questionstatus = $_GET['question'];
            $questionstatus = explode(',', $questionstatus);
        }

        if(isset($questionstatus[0]) && !empty($questionstatus[0])) {
            $question = selectFromQuestion($questionstatus[0]);

            if(isset($_POST['reponse']) && !empty($_POST['reponse'])) {
                insertIntoReponse($_POST['reponse'], $_SESSION['utilisateur']['id'], $questionstatus[0]);
            }
        }

        if(isset($question) && !empty($question) && !isset($questionstatus[1])) {

            $idquestion = $question[0]["Id_question"];
            $idprofil = $question[0]["#Id_profil"];
            $idcategorie = $question[0]["#Id_categorie"];

            $reponses = selectFromReponseWithIdQuestion($idquestion, "DESC");

            $users = selectFromProfilWithIdQuestion($idquestion, $idprofil);

            $categorie = selectFromCategorieWithIdQuestion($idquestion, $idcategorie);

            $title ='Question de '.$users[0]["Pseudo_profil"];
            require_once('includes/header.php');

            $nombrereponses = getNombreReponses($reponses);

        if (!empty($_SESSION)) {
            echo '<body class= "back">';
        }
        else {
            echo '<body>';
        }
        require_once('./includes/nav-bar-login.php');

    ?>
    <div>
        <div class="cardP w-50 mr-md-9 responsive-bootstrap-card m-card shadow-lg p-3 " id="questionpose<?php echo $idquestion ?>" >
            <form action="profil.php" method="get">
                <h5 class="card-header " id="reponse<?php echo $idquestion; ?>"><button class="text-dark" name="profil" value="<?php echo $users[0]["Id_profil"]; ?>"><img class="picture-user-small" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>"> <b><?php echo $users["0"]["Pseudo_profil"]; ?></button></b> a posé la question :</h5>
            </form>
            <div class="card-body">
                <h5 class="card-title">Catégorie : <?php echo $categorie["0"]["Libelle_categorie"]; ?></h5>
                <p class="card-text"><?php echo $question[0]["Titre_question"]; ?></p>
                <blockquote class="blockquote mb-2">
                    <p></p>
                    <footer class="blockquote-footer">Le <?php echo $question[0]["Date_creation_question"]; ?></footer>
                </blockquote>

                <div style="display: flex";>

                    <button class="pBtn toggle-btn" type="button" data-toggle="collapse" data-target="#repondre, #question<?php echo $idquestion; ?>" aria-expanded="false" aria-controls=" question<?php echo $idquestion; ?>">
                        <span class="afficher">Afficher les réponses (<?php echo $nombrereponses; ?>)</span>
                        <span class="masquer">Masquer les réponses</span>
                    </button>
                    <?php if($idprofil == $_SESSION['utilisateur']['id'] || $_SESSION['utilisateur']['role'] == 1) { ?>
                        <form action="./QuestionsReponses.php" method="get">
                            <button class="btn btn-danger mt-3" name="question" value="<?php echo $idquestion; ?>,supp">Supprimer la question</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="cardP w-50 responsive-bootstrap-card shadow-lg p-3 mt-2 collapse "  id="repondre">
        <div class="card-body">
            <form class="needs-validation" method="post" action="./QuestionsReponses.php?question=<?php echo $questionstatus[0]; ?>">
                <div class="form-row1" >
                    <div class=" mb-3" >
                        <label for="validationCustom01">Répondre à la question :</label>
                        <textarea  placeholder='' type="text" class="form-control autoExpand" id="validationCustom01" name="reponse" required></textarea>
                        <div class="invalid-feedback">
                            Veuillez saisir une réponse.
                        </div>
                    </div>
                </div>
                <button type="submit" style="margin-bottom: 2%;" class="pBtn">Envoyer</button>
            </form>
        </div>

        <?php

        if (!empty($reponses)) {
            foreach ($reponses as $reponse) {
                $idreponse = $reponse["Id_reponse"];

                $users = selectFromProfilWithIdReponse($idquestion, $idreponse);
        ?>

    </div>


    <div class="cardP w-50 responsive-bootstrap-card shadow-lg p-3 mt-2 collapse "  id="question<?php echo $idquestion; ?>">

        <div class="card-body">
            <div class="">
                <div class="card-header">
                    <form action="profil.php" class="text-dark" method="get">
                        <button class="text-dark" name="profil" value="<?php echo $users[0]["Id_profil"]; ?>"><img class="picture-user-small" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>"> <b><?php echo $users["0"]["Pseudo_profil"]; ?></button></b> a répondu :
                    </form>
                </div>
                <div class="card-body">
                    <?php echo $reponse["Contenu_reponse"]; ?>
                    <blockquote class="blockquote mb-0">

                        <footer class="blockquote-footer">Le <?php echo $reponse["Date_reponse"]; ?></footer>
                    </blockquote>
                </div>
            </div>

        </div>

    </div>
    </div> 
    <?php
            }
        }
        else {
    ?>

    <p>Wow, such empty.</p>

    </div>

    <?php
            }
        }

        elseif(isset($questionstatus[1])) {
            $title = 'Suppression de la question';
            require_once('includes/header.php');
            require_once('includes/nav-bar-login.php');
            ?>
                <!-- supp de la question ici -->
                <div class="card d-flex">
                    <div class="card-body ">
                        <img src="image/sad.gif" class="card-img-top " alt="triste">
                        <p class="card-text float-right ">Voulez vous vraiment supprimer cette question?
                        <form action="./delete.php" method="post">
                            <button class="btn btn-danger mt-3" name="question" value="<?php echo $questionstatus[0]; ?>">Supprimer</button>
                        </form>
                        <form action="./profil.php?profil=<?php echo $questionstatus[0]; ?>">
                            <button class="btn btn-primary mt-3" name="profil" value="<?php echo $questionstatus[0]; ?>">Revenir en arrière</button>
                        </form>
                    </div>
                </div>
            <?php
        }

        else {
            $title = 'Question Invalide';
            require_once('includes/header.php');
            require_once('./includes/nav-bar-login.php');
            echo 'Question introuvable. <a href="./index.php">Revenir aux questions</a>.';
        }
    ?>

<?php
    }
    else {
        $title = 'Accès refusé';
        require_once('includes/header.php');
        require_once('includes/nav-bar.php');
        echo '<p>Vous devez être <a href="./connexion_inscription.php">connecté</a> pour voir une question!</p>';
    }
        require_once('includes/footer.php');
?>