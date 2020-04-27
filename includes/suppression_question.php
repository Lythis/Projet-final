<body class="bgP">
    <div class="card d-flex">
        <div class="card-body ">
            <img src="image/sad.gif" class="card-img-top " alt="triste">
            <p class="card-text text-center ml-5 ">Voulez vous vraiment supprimer cette question?</p>
                <form class="text-center" action="./delete.php" method="post">
                    <button class="btn btn-danger mt-3" name="question" value="<?php echo $questionstatus[0]; ?>">Supprimer</button>
                </form>
                <form class="text-center" action="./QuestionsReponses.php?question=<?php echo $questionstatus[0]; ?>. " method="post">
                    <button class="btn btn-primary mt-3">Revenir en arrière</button>
                </form>
            </div>
        </div>
        