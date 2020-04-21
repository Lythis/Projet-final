<?php
    $dontstartsession = true;
    session_start();
    //L'utilisateur est-il bien connecté?
    if(!empty($_SESSION['utilisateur'])) {

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
                                <?php if($_SESSION['utilisateur']['id'] == $profilstatus[0] || $_SESSION['utilisateur']['role'] == 1) { ?>
                                <form action="./profil.php" method="get">
                                    <button class="pBtn" name="profil" value="<?php echo $users[0]["Id_profil"]; ?>,edit">Editer le profil</button>
                                    <button class="pBtn bg-danger" name="profil" value="<?php echo $users[0]["Id_profil"]; ?>,supp">Supprimer le profil</button>
                                </form>
                                <?php } ?>
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

        //Une requête pour modifier le profil est présente (on a donc 2 colonnes dans notre GET ($profilstatus))
        elseif(!empty($_GET['profil']) && !empty($users) && isset($profilstatus[1])) {
            //La requête est-elle bien égale à "edit"?
            if($profilstatus[1] == "edit") {
                //Le profil demandé est le profil actuel de la session ou la session est administrateur
                if($_SESSION['utilisateur']['id'] == $profilstatus[0] || $_SESSION['utilisateur']['role'] == 1) {
                    $title = 'Modification du profil de '.$users[0]["Pseudo_profil"];
                    require_once('includes/header.php');
                    require_once('includes/nav-bar-login.php');
                    ?>
                    <!-- edit du profil ici -->
                    <div class="change-image">
                        <img class="image-edit  img-fluid  picture-user" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>">
            
                        <label for="file" class="label-file">Choisir une image</label>
                        <input id="file" class="input-file" type="file">

                        <button class=" btn-edit text-dark"> Supprimer image </button>
                        
                    </div>
                    <div class="edit-profil">
                        <div class="card-body">
                            
                            <form>

                            <div>
                                <label for="exampleInputEmail1">Nouveau pseudo : </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $_SESSION['utilisateur']['pseudo']; ?>">
                            </div>
                            <div >
                                <label for="exampleInputPassword1">Nouveau MDP :</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div >
                                <label for="exampleInputPassword1">Nouvelle description :</label>
                                <textarea type="text" class="form-control autoExpand w-100" placeholder="<?php echo $users[0]["Description_profil"];?> " name="descriptionProfil" required></textarea>
                            </div>
                            <div >
                                <label for="validationTooltip02">Nouveau genre :</label>
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
           

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
        
            //La requête est-elle bien égale à "supp"?
            elseif($profilstatus[1] == "supp") {
                //Le profil demandé est le profil actuel de la session ou la session est administrateur
                if($_SESSION['utilisateur']['id'] == $profilstatus[0] || $_SESSION['utilisateur']['role'] == 1) {
                    $title = 'Suppression du profil de '.$users[0]["Pseudo_profil"];
                    require_once('includes/header.php');
                    require_once('includes/nav-bar-login.php');
                    ?>
                        <!-- supp du profil ici -->
                        <div class="card d-flex">
                            <div class="card-body ">
                                <img src="image/sad.gif" class="card-img-top " alt="triste">
                                <p class="card-text float-right ">Voulez vous vraiment supprimer ce compte?
                                <form action="./delete.php" method="post">
                                    <button class="btn btn-danger mt-3" name="profil" value="<?php echo $profilstatus[0]; ?>">Supprimer</button>
                                </form>
                                <form action="./profil.php?profil=<?php echo $profilstatus[0]; ?>">
                                    <button class="btn btn-primary mt-3" name="profil" value="<?php echo $profilstatus[0]; ?>">Revenir en arrière</button>
                                </form>
                                
                                
                            </div>
                        </div>
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
            //La requête n'est pas égale à "edit ou a supp"
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
    }
    else {
        $title = 'Accès refusé';
        require_once('includes/header.php');
        require_once('includes/nav-bar.php');
        echo '<p>Vous devez être <a href="./connexion_inscription.php">connecté</a> pour voir un profil!</p>';
    }
    
    ?>