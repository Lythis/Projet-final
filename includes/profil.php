<body class="bgP">
    <div class="profil">
        <div class="card ">
            <div class="row_ligne card_profil ">
                <div class="container_profil">
                    <div class="col-2 link-height">
                        <a  href="<?php echo $users["Image_profil"]; ?>">
                            <img class="rond_profil float-left  mr-4 picture-user" src="<?php echo $users["Image_profil"]; ?>" alt="<?php echo $users["Pseudo_profil"]; ?>">    
                        </a>       
                    </div>
                    <div class="col ">
                        <div class="profil_information">
                            <h3 class="card-title ml-2"><?php echo $users["Pseudo_profil"]; ?></h3>
                            
                            <h5>Genre : <?php echo $users["Genre_profil"]; ?></h5>
                            <h5>Nombre de questions posées : <?php echo count($questions) ?></h5>
                        </div>
                        <div class="profil_description">
                            <p> Description :  </p>
                            <p><?php echo $users["Description_profil"]; ?></p>
                        </div>
                        <div class="btn-flex">
                            <?php if($_SESSION['utilisateur']['id'] == $profilstatus[0] || $_SESSION['utilisateur']['role'] == 1) { ?>
                                <form action="./profil.php" method="get">
                                    <button class="btn btn-edit bg-primary text-white " name="profil" value="<?php echo $users["Id_profil"]; ?>,edit">Editer le profil</button>
                                    <button class="btn btn-supp bg-danger text-white" name="profil" value="<?php echo $users["Id_profil"]; ?>,supp">Supprimer profil</button>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="titre_post">
                Questions recentes de <?php echo $users["Pseudo_profil"]; ?>
            </p>
            
            <?php
            if (!empty($questions)) {
                foreach ($questions as $question) {
                    ?>
                    <div class=" p-card">
                        <div class="card-headerP">
                            <img class="rond_profil float-left  image-questions" src="<?php echo $users["Image_profil"]; ?>" alt="<?php echo $users["Pseudo_profil"]; ?>">
                            
                            <h5 class="card-title pseudo-card"> <?php echo $users["Pseudo_profil"]; ?> :</h5>
                            
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
                echo'<div class="card">
                    <div class="card-headerP ">
                        <p>Wow, such empty.</p>
                    </div>
                </div>';
            }
            ?>
            
        </div>
        
        