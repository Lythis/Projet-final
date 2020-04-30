<body class="bgP">
    <div class="card d-flex">
        <div class="card-body ">
            <img src="image/sad.gif" class="card-img-top " alt="triste">
            <p class="card-text float-right ">Voulez vous vraiment supprimer ce compte?
                <form class="text-center" action="./delete.php" method="post">
                    <button class="btn btn-danger mt-3" name="profil" value="<?php echo $profilStatus[0]; ?>">Supprimer</button>
                </form>
                <form class="text-center" action="./profil.php?profil=<?php echo $profilStatus[0]; ?>">
                    <button class="btn btn-primary mt-3" name="profil" value="<?php echo $profilStatus[0]; ?>">Revenir en arrière</button>
                </form>
            </div>
        </div>
        