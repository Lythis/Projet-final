<?php
    require_once('db/base_PDO.php');
    $title ='Poser une Question';
    require_once('includes/header.php');
?>


<?php
    if (!empty($_SESSION)) {
        echo '<body class= "back">';
    }
    else {
        echo '<body>';
    }
?>  

    <?php 
        require_once('./includes/nav-bar-login.php');

        if (!empty($_POST['question']) && !empty($_POST['categorie']) && $_POST['poserquestion'] == 'valide') {

            $obtenirdate = getdate();
            $date = $obtenirdate['year']."-".$obtenirdate['mon']."-".$obtenirdate['mday'];

            $query = $con->prepare('INSERT INTO `question`(`Titre_question`, `Date_creation_question`, `#Id_profil`, `#Id_categorie`) VALUES (:question, :dateajd, :id_user, :id_categorie)');
            $query->bindParam(':question', $_POST['question']);
            $query->bindParam(':dateajd', $date);
            $query->bindParam(':id_user', $_SESSION['utilisateur']['id']);
            $query->bindParam(':id_categorie', $_POST['categorie']);
            $query->execute();

    ?>
        <p>Votre question a bien été envoyé. <a href="./index.php">Voir les questions</a>.</p>
    <?php
        }
        elseif (!empty($_SESSION)) {
    ?>
    <div class="cardP w-50 mr-md-9 responsive-bootstrap-card m-card shadow-lg p-3">
  <div class="card-body">
  <div>
        <div class="form-group">
            <form class="needs-validation" method="post" action="Questions.php" novalidate>
                <div class="form-group">
                    <div class="col-lg">
                        <label for="validationTooltip01">Votre question :</label>
                        <textarea type="text" class="form-control" id="validationTooltip01" placeholder="Question" name="question" required></textarea>
                        <div class="invalid-feedback mb-2">
                            Veuillez saisir une question.
                        </div>
                    </div>
                    <div class="col-lg">
                        <label for="validationTooltip02">Catégorie :</label>
                        <select class="custom-select mb-2" id="validationTooltip02" placeholder="Categorie" name="categorie" required>
                            <option value="">Selectionner une catégorie</option>
                            <option value="1">Anime</option>
                            <option value="2">NSFW</option>
                            <option value="3">Voiture</option>
                            <option value="4">Informatique</option>
                            <option value="5">Coronavirus</option>
                            <option value="6">Politique</option>
                            <option value="7">VM</option>
                            <option value="8">Idols</option>
                            <option value="9">K-Pop</option>
                            <option value="10">Japon</option>

                        </select>
                        <div class="invalid-feedback mb-2">
                            Veuillez selectionner une categorie.
                        </div>
                    </div>
                    <button type="submit" class="pBtn " name="poserquestion" value="valide">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
    

<?php
    }
    else {
?>
    <p>Vous devez être <a href="./connexion_inscription.php">connecté</a> pour poser une question!</p>
<?php
    }
?>

<div class="bas-page">
    <?php
        require_once('includes/footer.php');
    ?>
</div>