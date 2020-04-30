<nav class="navbar navbar-expand-lg shadow p-3 mb-5 bg-white rounded sticky-top">
    <a class="titre text-dark" href="./index.php">LiveQuestion</a>
    <button class="btn-nav " type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon pt-1" ></span>
    </button>
    <div class="collapse navbar-collapse text-white" id="navbarNavDropdown">
        <span class="navbar-text">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active text-dark" href="./Questions.php">Poser une question</a>
                </li>
                <li class="nav-item">
                    <a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $_SESSION['utilisateur']['id']; ?>"><img class="picture-user-small" src="<?php echo $_SESSION['utilisateur']['image']; ?>" alt="<?php echo $_SESSION['utilisateur']['pseudo']; ?>"></a> <a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $_SESSION['utilisateur']['id']; ?>"><b><?php echo $_SESSION['utilisateur']['pseudo']; ?></a></b>
                </li>
                <form action="./index.php" method="post">
                    <button type="submit" class="bouttonC text-white" name="deconnexion" value="valide">Déconnexion</button>
                </form>
            </ul>
        </span>
    </div>
    
</nav>
