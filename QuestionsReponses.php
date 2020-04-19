<?php
require_once('db/base_PDO.php');
$dontstartsession = true;
session_start();

if(isset($_GET['question'])) {
    $getthequestion = $_GET['question'];
    $query = $con->prepare("SELECT * FROM question WHERE `Id_question` = $getthequestion");
    $query->execute();
    $question = $query->fetchAll();

    if(isset($_POST['reponse']) && !empty($_POST['reponse']) && !empty($_SESSION['utilisateur'])) {
        $obtenirdate = getdate();
        $date = $obtenirdate['year']."-".$obtenirdate['mon']."-".$obtenirdate['mday'];
    
        $query = $con->prepare('INSERT INTO `reponse`(`Contenu_reponse`, `Date_reponse`, `#Id_profil`, `#Id_question`) VALUES (:reponse, :dateajd, :id_user, :id_question)');
        $query->bindParam(':reponse', $_POST['reponse']);
        $query->bindParam(':dateajd', $date);
        $query->bindParam(':id_user', $_SESSION['utilisateur']['id']);
        $query->bindParam(':id_question', $_GET['question']);
        $query->execute();
    }
}

if(!empty($_GET['question']) && !empty($question)) {

    $idquestion = $question[0]["Id_question"];
    $idprofil = $question[0]["#Id_profil"];
    $idcategorie = $question[0]["#Id_categorie"];

    $query = $con->prepare("SELECT * FROM `reponse` WHERE `#Id_question` = ( SELECT `Id_question` FROM `question` WHERE `Id_question` = $idquestion) ORDER BY `Date_reponse` DESC");
    $query->execute();
    $reponses = $query->fetchAll();

    $query = $con->prepare("SELECT * FROM `profil` WHERE `Id_profil` = ( SELECT `#Id_profil` FROM `question` WHERE `Id_question` = $idquestion AND `#Id_profil` = $idprofil )");
    $query->execute();
    $users = $query->fetchAll();

    $query = $con->prepare("SELECT * FROM `categorie` WHERE `Id_categorie` = ( SELECT `#Id_categorie` FROM `question` WHERE `Id_question` = $idquestion AND `#Id_categorie` = $idcategorie )");
    $query->execute();
    $categorie = $query->fetchAll();

    $title ='Question de '.$users[0]["Pseudo_profil"];
    require_once('includes/header.php');

    $nombrereponses = 0;
    if(!empty($reponses)) {
        for ($ind=0; $ind < count($reponses); $ind++) { 
            $nombrereponses = $nombrereponses + 1;
        }
    }


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
    if (!empty($_SESSION)) {
        require_once('./includes/nav-bar-login.php');
    }
    else {
        require_once('./includes/nav-bar.php');
    }
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
            </div>
        </div>
    </div>
</div>
<div class="cardP w-50 responsive-bootstrap-card shadow-lg p-3 mt-2 collapse "  id="repondre">
    <div class="card-body">
        <form class="needs-validation" method="post" action="./QuestionsReponses.php?question=<?php echo $_GET['question']; ?>">
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

            $unereponse = $reponse["Id_reponse"];

            $query = $con->prepare("SELECT * FROM `profil` WHERE `Id_profil` = ( SELECT `#Id_profil` FROM `reponse` WHERE `#Id_question` = $idquestion AND `Id_reponse` = $unereponse)");
            $query->execute();
            $users = $query->fetchAll();

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
else {
    $title = 'Question Invalide';
    require_once('includes/header.php');
    require_once('includes/nav-bar.php');
    echo 'Question introuvable. <a href="./index.php">Revenir aux questions</a>.';
}
?>

<?php

require_once('includes/footer.php');
?>