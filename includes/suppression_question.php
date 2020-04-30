<body class="bgP">
    <div class="pCard d-flex">
        <div class="card-body ">
            <img src="image/sad.gif" class="card-img-top " alt="triste">

            <p class="card-text" style="margin-left: 13%;">Voulez vous vraiment supprimer cette question?
                <form action="./delete.php" method="post">
                    <button class="btn btn-danger mt-3" name="question" value="<?php echo $questionStatus[0]; ?>"style="margin-left: 36%;" >Supprimer</button>
                </form>
                <a href="./QuestionsReponses.php?question=<?php echo $questionStatus[0]; ?>" class="btn btn-primary mt-3" style="margin-left: 28%;">Revenir en arrière</a>
            </div>
        </div>
        