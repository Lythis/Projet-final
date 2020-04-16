<nav class="navbar navbar-expand-lg shadow p-3 mb-5 bg-white rounded sticky-top">
    <a class="titre text-dark" href="./index.php">Saint Vincent BTS 1</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-white" id="navbarNavDropdown">
        <span class="navbar-text">
            <ul class="navbar-nav ">
            
            <li class="nav-item">
            <a class="nav-link active text-dark" href="./Questions.php">poser une question</a>
            </li>
            <?php
                    if (!empty($_SESSION)) {
                ?>
                <li class="nav-item">
                    <form action="./profil.php" method="get">
                        <button name="profil" class="boutton text-dark" value="<?php echo $_SESSION['utilisateur']['id']; ?>"><img class="picture-user-small" src="./image_profil/<?php echo $_SESSION['utilisateur']['image']; ?>" alt="<?php echo $_SESSION['utilisateur']['pseudo']; ?>"><?php echo $_SESSION['utilisateur']['pseudo']; ?></button>
                    </form>
                </li>
                <form action="./index.php" method="post">
                    <button type="submit" class="bouttonC text-white" name="deconnexion" value="valide">Déconnexion</button>
                </form>
                <?php
                    }
                    else {
                ?>
                <button onclick="window.location.href ='./connexion_inscription.php'" type="button" class="boutton text-white">Se connecter</button>
                <?php
                    }
                ?>
            </ul>
        </span>
    </div>
</nav>
