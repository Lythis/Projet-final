<body class="bgP">
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
                        <h5>Nombre de questions posées : <?php echo count($questions) ?></h5>
                    </div>
                    <div class="profil_description">
                        <p> Description :  </p>
                        <p><?php echo $users[0]["Description_profil"]; ?></p>
                    </div>
                    <div>
                        <?php if($_SESSION['utilisateur']['id'] == $profilstatus[0] || $_SESSION['utilisateur']['role'] == 1) { ?>
                            <form action="./profil.php" method="get">
                                <button class="btn bg-primary text-white " name="profil" value="<?php echo $users[0]["Id_profil"]; ?>,edit">Editer le profil</button>
                                <button class="btn bg-danger text-white" name="profil" value="<?php echo $users[0]["Id_profil"]; ?>,supp">Supprimer le profil</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="titre_post">
        Questions recentes de <?php echo $users [0]["Pseudo_profil"]; ?>
    </p>

    <?php
    if (!empty($questions)) {
        foreach ($questions as $question) {
            ?>
            <div class=" p-card">
                <div class="card-headerP">
                    <img class="rond_profil float-left img-fluid image-questions" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>">
                    
                    <h5 class="card-title pseudo-card"> <?php echo $users[0]["Pseudo_profil"]; ?> :</h5>
                    
                    <div class="cardbody">
                        <blockquote class="blockquote mb-0">
                            <p class="card-text question-text"><?php echo $question["Titre_question"]; ?></p>
                            <form action="./QuestionsReponses.php" method="get">
                                <button  class="btn btn-profil btn-primary mr-4 toggle-btn" name="question" value="<?php echo $question["Id_question"] ?>"> 
                                    Voir la question
                                </button>
                            </form>
                        </blockquote>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    else {
        print '<p class="card-text">Wow, such empty.</p>';
    }
    ?>

</div>
<<<<<<< HEAD
=======
<?php footer()?>
>>>>>>> 1e9b29eb80540a5e68697ffdd7870e2f5ad2ec18
