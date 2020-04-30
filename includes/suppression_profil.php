<body class="bgP">
    <div class="pCard d-flex">
        <div class="card-body ">
            <img src="image/sad.gif" class="card-img-top " alt="triste">
            <p class="card-text  ml-5 ">Voulez vous vraiment supprimer ce compte?
                <form action="./delete.php" method="post">
                    <button class="btn btn-danger mt-3" name="profil" value="<?php echo $profilStatus[0]; ?>" style="margin-left: 36%;">Supprimer</button>
                </form>
                <form action="./profil.php?profil=<?php echo $profilStatus[0]; ?>">
                    <button class="btn btn-primary mt-3" name="profil" value="<?php echo $profilStatus[0]; ?>" style="margin-left: 28%;">Revenir en arrière</button>
                </form>
            </div>
        </div>
        