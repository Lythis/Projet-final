<body class="bgP">
    <div class="card d-flex">
        <div class="card-body ">
            <img src="image/sad.gif" class="card-img-top " alt="triste">

            <p class="card-text float-right ">Voulez vous vraiment supprimer cette question?
                <form action="./delete.php" method="post">
                    <button class="btn btn-danger mt-3" name="question" value="<?php echo $questionStatus[0]; ?>">Supprimer</button>
                </form>
                <a href="./QuestionsReponses.php?question=<?php echo $questionStatus[0]; ?>" class="btn btn-primary mt-3">Revenir en arrière</a>
            </div>
        </div>
        