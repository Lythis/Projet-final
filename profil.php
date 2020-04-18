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
    <div class="profil">
        <div class="card responsive-bootstrap-card mx-5">
            <div class="row_ligne card_profil card-headerP">
                <div class="container_profil">
                    <div class="col-3">
                        <img class="rond_profil float-left img-fluid mr-4 picture-user" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>">
                    </div>
                    <div class="col ">
                        <div class="profil_information">
                            <h3 class="card-title ml-2"><?php echo $users[0]["Pseudo_profil"]; ?></h3>
                            
                            <h5>Genre : <?php echo $users[0]["Genre_profil"]; ?></h5>
                            <h5> Nombre de Post : <?php echo count($questions) ?></h5>
                        </div>
                        <div class="profil_description">
                            <p> Description :  </p>
                            <p><?php echo $users[0]["Description_profil"]; ?></p>
                        </div>
                        <div>
                            <a href=""> Modifier le profil </a>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    
        <p class="titre_post">
            Post-Recent de <?php echo $users [0]["Pseudo_profil"]; ?>
        </p>
        <?php
                    if (!empty($questions)) {
                        foreach ($questions as $question) {
                    ?>
                    <div class=" p-card">
                        <div class="card-headerP">
                        <img class="rond_profil float-left img-fluid image-questions" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>">

                            <h5 class="card-title pseudo-card"> <?php echo $users[0]["Pseudo_profil"]; ?> :</h5>
                            
                            <form action="./QuestionsReponses.php" method="get">
                            <div class="cardbody">
                                <blockquote class="blockquote mb-0">
                                    <p class="card-text question-text"><?php echo $question["Titre_question"]; ?></p>
                                    <button  class="btn btn-primary toggle-btn" type="button" name="question-profil" value="<?php echo $question["Id_question"] ?>"> 
                                        voir
                                    </button>
                    
                                </blockquote>
                            </div>
                            </form>
                        </div>
                    </div>
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

    </div>
   
                    