<?php
    require_once('db/base_PDO.php');

    $gettheprofil = $_GET['profil'];
    $query = $con->prepare("SELECT * FROM profil WHERE `Id_profil` = $gettheprofil");
    $query->execute();
    $users = $query->fetchAll();

    if(!empty($_GET['profil']) && !empty($users)) {

        $idprofil = $users[0]["Id_profil"];
        $role = $users[0]["#Id_role"];

        $query = $con->prepare("SELECT * FROM `question` WHERE `#Id_profil` = $idprofil");
        $query->execute();
        $questions = $query->fetchAll();

        $title ='Profil de '.$users[0]["Pseudo_profil"];
        require_once('includes/header.php');
    
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
    else {
        $title = 'Profil introuvable';
        require_once('includes/header.php');
        require_once('includes/nav-bar.php');
        echo 'Profil introuvable. <a href="./index.php">Revenir à l\'accueil</a>.';
    }
    ?>
    <div class="bas-page">
    <?php
        require_once('includes/footer.php');
    ?>
    </div>