<?php
    if(isset($resultAmi) && !empty($resultAmi)) { ?>
        <label><i class="fas fa-check"></i> <?php echo $resultAmi; ?></label>
    <?php }
?>
<div class="notif mx-auto">
    <h2>Amis :</h2>
    <?php
        $amis = getAmi($_SESSION["utilisateur"]["id"]);

        if(!empty($amis)) {
            foreach($amis as $ami) { ?>
                <div class="p-card amiafficher">
                    <div>
                        <img class="rond_profil float-left image-questions" src="<?php echo $ami["Image_profil"]; ?>" alt="<?php echo $ami["Pseudo_profil"]; ?>">
                        
                        <div class="cardbody">
                            <blockquote class="blockquote mb-0">
                                <a href="profil.php?profil=<?php echo $ami["Id_profil"]; ?>"><h5 class="card-title pseudo-card"> <?php echo $ami["Pseudo_profil"]; ?></h5></a>
                            </blockquote>
                            <form action="./notifications.php" method="post">
                                <button class="btn  bg-danger text-white" name="ami" value="<?php echo $ami["Id_profil"]; ?>,Supprimer">Supprimer de la liste d'amis</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>

        <p>Aucun ami.</p>

    <?php } ?>

    <h2>Demandes reçus :</h2>
    <?php
        $demandesRecu = getDemande($_SESSION["utilisateur"]["id"], false);

        if(!empty($demandesRecu)) {
            foreach($demandesRecu as $demande) { ?>
                <div class="p-card amiafficher">
                    <div>
                        <img class="rond_profil float-left image-questions" src="<?php echo $demande["Image_profil"]; ?>" alt="<?php echo $demande["Pseudo_profil"]; ?>">
                        
                        <div class="cardbody">
                            <blockquote class="blockquote mb-0">
                                <a href="profil.php?profil=<?php echo $demande["Id_profil"]; ?>"><h5 class="card-title pseudo-card"> <?php echo $demande["Pseudo_profil"]; ?></h5></a>
                            </blockquote>
                            <form action="./notifications.php" method="post">
                                <button class="btn  bg-success text-white" name="ami" value="<?php echo $demande["Id_profil"]; ?>,Ajouter">Accepter la demande d'ami</button>
                                <button class="btn  bg-danger text-white" name="ami" value="<?php echo $demande["Id_profil"]; ?>,Rejeter">Refuser la demande d'ami</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>
        <div class="p-card-notif ">
                    <div>
                        <div class="cardbody">
                        <p>Aucune demande en attente.</p>
                        </div>
                    </div>
                </div>
        

    <?php } ?>

    <h2>Demandes envoyées :</h2>
    <?php
        $demandesEnvoyes = getDemande($_SESSION["utilisateur"]["id"], true);

        if(!empty($demandesEnvoyes)) {
            foreach($demandesEnvoyes as $demande) { ?>
                <div class="p-card amiafficher">
                    <div>
                        <img class="rond_profil float-left image-questions" src="<?php echo $demande["Image_profil"]; ?>" alt="<?php echo $demande["Pseudo_profil"]; ?>">
                        
                        <div class="cardbody">
                            <blockquote class="blockquote mb-0">
                                <a href="profil.php?profil=<?php echo $demande["Id_profil"]; ?>"><h5 class="card-title pseudo-card"> <?php echo $demande["Pseudo_profil"]; ?></h5></a>
                            </blockquote>
                            <form action="./notifications.php" method="post">
                                <button class="btn  bg-danger text-white" name="ami" value="<?php echo $demande["Id_profil"]; ?>,Annuler">Annuler la demande d'ami</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>

        <p>Aucune demande envoyée.</p>

    <?php } ?>
</div>