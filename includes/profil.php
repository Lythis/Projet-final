<body class="bgP">
    <div class="profil">
        <div>
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
                            <h5>Nombre d'amis : <?php echo count($amis) ?></h5>
                        </div>
                        <div class="profil_description">
                            <p> Description :  </p>
                            <p><?php echo $users["Description_profil"]; ?></p>
                        </div>
                        <div class="btn-flex">
                            <?php if($_SESSION['utilisateur']['id'] == $profilStatus[0] || $_SESSION['utilisateur']['role'] == 1) { ?>
                                <form action="./profil.php" method="get">
                                    <button class="btn bg-primary text-white " name="profil" value="<?php echo $users["Id_profil"]; ?>,edit">Editer le profil</button>
                                    <button class="btn btn-supp bg-danger text-white" name="profil" value="<?php echo $users["Id_profil"]; ?>,supp">Supprimer profil</button>
                                </form>
                            <?php } ?>
                            <?php if($_SESSION['utilisateur']['id'] != $profilStatus[0]) {
                                if(areFriends($_GET["profil"], $_SESSION['utilisateur']['id']) == true) { ?>
                                    <form action="./notifications.php" method="post" class="btn-edit">
                                        <button class="btn  bg-danger text-white" name="ami" value="<?php echo $_GET["profil"]; ?>,Supprimer">Supprimer de la liste d'amis</button>
                                    </form>
                                <?php } else {
                                    if(getDemandeStatus($_GET["profil"], $_SESSION['utilisateur']['id']) == "demandeCurrent") { ?>
                                        <form action="./notifications.php" method="post">
                                            <button class="btn  bg-success text-white" name="ami" value="<?php echo $_GET["profil"]; ?>,Ajouter">Accepter la demande d'ami</button>
                                            <button class="btn  bg-danger text-white" name="ami" value="<?php echo $_GET["profil"]; ?>,Rejeter">Refuser la demande d'ami</button>
                                        </form>
                                    <?php } elseif(getDemandeStatus($_GET["profil"], $_SESSION['utilisateur']['id']) == "demandeUtilisateur") { ?>
                                        <form action="./notifications.php" method="post" class="btn-edit">
                                            <button class="btn  bg-danger text-white" name="ami" value="<?php echo $_GET["profil"]; ?>,Annuler">Annuler la demande d'ami</button>
                                        </form>
                                    <?php } elseif(getDemandeStatus($_GET["profil"], $_SESSION['utilisateur']['id']) == "erreur") { ?>
                                        <p>Problème dans la base de données!</p>
                                    <?php }
                                    else { ?>
                                        <form action="./notifications.php" method="post" class="btn-edit">
                                            <button class="btn  bg-success text-white" name="ami" value="<?php echo $_GET["profil"]; ?>,Envoyer">Ajouter en ami</button>
                                        </form>
                                    <?php }
                                }
                                ?>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="listeamiprofil">
                <p class="titre_post" style="margin-top: 4%;">
                    Liste d'amis de <?php echo $users["Pseudo_profil"]; ?>
                </p>
                
                            <div class="p-card amiafficher">
                                <div >
                                <?php
                    if(!empty($amis)) 
                        foreach ($amis as $ami) {
                            ?>
                            <div class="list-ami">
                            <img class="rounded-circle float-left image-profil" src="<?php echo $ami["Image_profil"]; ?>" alt="<?php echo $ami["Pseudo_profil"]; ?>">
                                    
                                    <div class="cardbody">
                                        <blockquote class="blockquote mb-0">
                                            <a href="profil.php?profil=<?php echo $ami["Id_profil"]; ?>"><h5 class="card-title pseudo-card-ami"> <?php echo $ami["Pseudo_profil"]; ?></h5></a>
                                        </blockquote>
                                    </div>
                            </div>
                                    
                                    <?php
                        }
                    
             ?>
                                </div>
                            </div>
                           
            </div>
            <div class="questionsrecentes">
                <p class="titre_post">
                    Questions recentes de <?php echo $users["Pseudo_profil"]; ?>
                </p>
                <?php
                if (!empty($questions)) {
                    ?>
                        
                            <?php
                
                    foreach ($questions as $question) {
                        ?>
                        <div <?php if($question["Type"] == 1) { ?> style="background-color: #ECDCEC;" <?php } ?> class="p-card">
                            <div >
                                <img class="rounded-circle float-left  image-profil " src="<?php echo $users["Image_profil"]; ?>" alt="<?php echo $users["Pseudo_profil"]; ?>">
                                
                                <h5 class="card-title pseudo-card"> <?php echo $users["Pseudo_profil"]; ?> :</h5>
                                
                                <div class="cardbody">
                                    <blockquote class="blockquote mb-0">
                                        <p class="card-text-profil question-text"><?php echo $question["Titre_question"]; ?></p>
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
                            
                                ?>
                            </div>
                        
                <?php
               } else {
                ?>
                    <div class="p-card">
                        <div class="card-headerP">
                            <p>Wow, such empty.</p>
                        </div>
                    </div>
                    
                <?php
                    }
                    footer();
                ?>
         
