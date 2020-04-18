<?php
    //Connexion à la base de données
    require_once('db/base_PDO.php');

    //On a bien recupéré des données en GET
    if(!empty($_GET['profil'])) {
        $profilstatus = $_GET['profil'];
        //Séparation du GET en 2 à partir de la virgule (création d'un tableau à 2 colonnes si on a bien une virgule, sinon une seule colonne)
        $profilstatus = explode(',', $profilstatus);
    }

    //Ici $profilstatus[0] == la première colonne du tableau qu'on a recupéré (donc de notre GET) || Est-ce qu'on a bien un profil présent dans le GET?
    if(isset($profilstatus[0])) {
        $gettheprofil = $profilstatus[0];
        $query = $con->prepare("SELECT * FROM profil WHERE `Id_profil` = $gettheprofil");
        $query->execute();
        $users = $query->fetchAll();
    }

    //Notre GET n'est pas vide et on a récupéré les informations de l'utilisateur présent dans notre GET (ici présent dans $users, donc si $users n'est pas vide)
    if(!empty($_GET['profil']) && !empty($users)) {

        $idprofil = $users[0]["Id_profil"];
        $role = $users[0]["#Id_role"];

        $query = $con->prepare("SELECT * FROM `question` WHERE `#Id_profil` = $idprofil");
        $query->execute();
        $questions = $query->fetchAll();

        $title ='Profil de '.$users[0]["Pseudo_profil"];
        require_once('includes/header.php');
    }

    //Notre tableau GET ($profilstatus) ne contient qu'une seule colonne
    if(!empty($_GET['profil']) && !empty($users) && !isset($profilstatus[1])) {
?>

<body>
    <?php 
    require_once('./includes/nav-bar-login.php');
    ?>
    <div class="card responsive-bootstrap-card mx-5">
        <div class="row_ligne card-header">
            <div class="container_profil">
                <div class="col-3">
                    <img class="rounded float-left img-fluid mr-4 picture-user" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>">
                </div>
                <div class="col ">
                    <h3 class="card-title ml-2"><?php echo $users[0]["Pseudo_profil"]; ?></h3>
                    <h5>Genre : <?php echo $users[0]["Genre_profil"]; ?></h5>
                    <p><?php echo $users[0]["Description_profil"]; ?></p>
                    <form action="./profil.php" method="get">
                        <button name="profil" value="<?php echo $users[0]["Id_profil"]; ?>,edit">Editer le profil</button>
                    </form>
                </div>

            </div>
            <div class="row_ligne card-body">
                <div class="col">
                    <h5 class="card-title ">Questions posées par <?php echo $users[0]["Pseudo_profil"]; ?> :</h5>
                    <?php
                    if (!empty($questions)) {
                        foreach ($questions as $question) {
                    ?>
                        <form action="./QuestionsReponses.php" method="get">
                            <p class="card-text"><button name="question" value="<?php echo $question["Id_question"] ?>"><?php echo $question["Titre_question"]; ?></button></p>
                        </form>
                    <?php
                        }
                    }
                    else {
                    ?>
                        <p class="card-text">Wow, such empty.</p>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    }

    //Une requête pour modifier le profil est présente (on a donc 2 colonnes dans notre GET ($profilstatus))
    elseif(!empty($_GET['profil']) && !empty($users) && isset($profilstatus[1])) {
        //La requête est-elle bien égale à "edit"?
        if($profilstatus[1] == "edit") {
            //Le profil demandé est le profil actuel de la session ou la session est administrateur
            if($_SESSION['utilisateur']['id'] == $profilstatus[0] || $_SESSION['utilisateur']['role'] == 1) {
                $title = 'Modification du profil de '.$users[0]["Pseudo_profil"];
                require_once('includes/header.php');
                require_once('includes/nav-bar.php');
                ?>
                    <!-- edit du profil ici -->
                <?php
            }
            //Message d'erreur car accès refusé
            else {
                $title = 'Accès refusé';
                require_once('includes/header.php');
                require_once('includes/nav-bar.php');
                echo 'Vous n\'avez pas le droit de modifier ce profil. <a href="./index.php">Revenir à l\'accueil</a>.';
            }
        }
        //La requête n'est pas égale à "edit"
        else {
            $title = 'Erreur';
            require_once('includes/header.php');
            require_once('includes/nav-bar.php');
            echo 'Problème lors de votre requête. <a href="./index.php">Revenir à l\'accueil</a>.';
        }
    }

    //Message d'erreur classique si le profil est introuvable ou n'importe quel autre problème
    else {
        $title = 'Profil introuvable';
        require_once('includes/header.php');
        require_once('includes/nav-bar.php');
        echo 'Profil introuvable. <a href="./index.php">Revenir à l\'accueil</a>.';
    }
    ?>