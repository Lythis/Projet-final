<body class="bgP">
    <div id="change-image">
        <img class="image-edit  img-top picture-user" src="<?php echo $users["Image_profil"]; ?>" alt="<?php echo $users["Pseudo_profil"]; ?>">
        <div class="form-image-edit">
            <form method="post" action="./profil.php?profil=<?php echo $profilStatus[0]; ?>%2Cedit">
                <div>
                    <label >URL de l'image : </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="image" value="<?php echo $users["Image_profil"]; ?>">
                    <button class="btn-edit text-white">Envoyer l'image</button>
                </div>
            </form>
                      
            <form method="post" action="./profil.php?profil=<?php echo $profilStatus[0]; ?>%2Cedit">
                <button class=" text-white delete-btn" name="image" value="./image_profil/Default.png">Supprimer l'image</button>
            </form>
        </div>
    </div>
    <div class="edit-profil">
        <div class="card-body">
            <form action="./profil.php?profil=<?php echo $profilStatus[0]; ?>%2Cedit" method="post">
                <div class="mb-3">

                    <label >Pseudo : </label> <?php if($success['pseudo'] == "true") {?> <i class="fas fa-check"></i> Modification réussi <?php } elseif($success['pseudo'] == "failpseudo") { ?> <i class="fas fa-times"></i> Modification impossible <?php } ?>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pseudo" value="<?php echo $users["Pseudo_profil"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label >E-mail : </label> <?php if($success['mail'] == "true") { ?> <i class="fas fa-check"></i> Modification réussi <?php } elseif($success['mail'] == "failmail") { ?> <i class="fas fa-times"></i> Modification impossible <?php } elseif($success['mail'] == "mailexist") { ?> <i class="fas fa-times"></i> Cet e-mail existe déjà <?php } ?>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail" value="<?php echo $users["Mail_profil"]; ?>" required>
                </div>
                <div class=" mb-3">
                    <label>Mot de passe actuel : </label> <?php if($success['mdp'] == "true") {?> <i class="fas fa-check"></i> Modification réussi <?php } elseif($success['mdp'] == "failmdp") { ?> <i class="fas fa-times"></i> Modification du mot de passe impossible - Mot de passe incorrect <?php } ?>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="" aria-describedby="inputGroupPrepend" name="mdp">
                    </div>
                </div>
                <div class=" mb-3">
                    <label>Nouveau mot de passe : </label> <?php if($success['mdp'] == "true") {?> <i class="fas fa-check"></i> Modification réussi <?php } elseif($success['mdp'] == "failnvmdp") { ?> <i class="fas fa-times"></i> Modification du mot de passe impossible - Les mots de passe saisis ne correspondent pas <?php } ?>
                    <div class="input-group">
                        <input type="password" class="form-control" id="validationCustomMDP" placeholder="" aria-describedby="inputGroupPrepend" name="nvmdp">
                    </div>
                </div>
                <div class=" mb-3">
                    <label>Confirmation mot de passe : </label> <?php if($success['mdp'] == "true") {?> <i class="fas fa-check"></i> Modification réussi <?php } elseif($success['mdp'] == "failnvmdp") { ?> <i class="fas fa-times"></i> <?php } ?>
                    <div class="input-group">
                        <input type="password" class="form-control" id="validationCustomMDP" placeholder="" aria-describedby="inputGroupPrepend" name="nvmdpconfirm">
                        
                    </div>
                </div>
                
                <div>
                    <label >Description :</label> <?php if($success['description'] == "true") {?> <i class="fas fa-check"></i> Modification réussi <?php } ?>
                    <textarea type="text" class="form-control autoExpand w-100 h-25" id="desc" maxlength="250" name="description"><?php echo $users["Description_profil"]; ?></textarea>
                    <p style="text-align:right" id="compteur">0 mots | 0 Caractere / 250</p>
                </div>
                <div >
                    <label >Genre :</label> <?php if($success['genre'] == "true") {?> <i class="fas fa-check"></i> Modification réussi <?php } ?>
                    <select class="custom-select mb-2" name="genre" required>
                        <option value="Homme" <?php if($users["Genre_profil"] == "Homme") { ?>selected<?php } ?>>Homme</option>
                        <option value="Femme" <?php if($users["Genre_profil"] == "Femme") { ?>selected<?php } ?>>Femme</option>
                        <option value="Non-binaire" <?php if($users["Genre_profil"] == "Non-binaire") { ?>selected<?php } ?>>Non-binaire</option>
                        <option value="Hélicoptère d'attaque" <?php if($users["Genre_profil"] == "Hélicoptère d'attaque") { ?>selected<?php } ?>>Hélicoptère d'attaque</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary" name="inscription" value="valide">Accepter</button>
            </form>
        </div>
    </div>
    <?php footer()?>