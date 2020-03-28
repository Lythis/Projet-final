<?php
$title ='Connexion/inscription';
require_once('includes/header.php');
?>

<body>
    <?php 
    require_once('includes/nav-bar.php');
    ?>
    <body class="inscription">
        <?php
        require_once('includes/nav-bar.php');
        ?>
        <div class="rowe2">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">connexion</h5>
                        <form>
                            <div class="form-group">
                                <label for="InputEmail1">Email address</label>
                                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="entre ton email">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">mot de passe</label>
                                <input type="password" class="form-control" id="InputPassword1" placeholder="MDP">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">pas de compte, alors inscris toi</h5>
                        <p class="card-text">inscris toi afin de poser des questions</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inscription">
                            inscription
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="inscription" tabindex="-1" role="dialog" aria-labelledby="inscriptionLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="inscriptionLabel">Page inscription</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="InputPseudo">pseudo</label>
                                                <input type="email" class="form-control" id="pseudo" aria-describedby="pseudoHelp" placeholder="ecrit ton pseudo.">
                                                <small id="pseudoHelp" class="form-text text-muted"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="entre ton email">
                                                <small id="emailHelp" class="form-text text-muted"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputPassword1">mot de passe</label>
                                                <input type="password" class="form-control" id="InputPassword1" placeholder="MDP">
                                            </div>
                                            <div class="form-group">
                                                <label for="InputPassword1">confirme ton MDP</label>
                                                <input type="password" class="form-control" id="InputPassword1" placeholder="confirme ton MDP">
                                            </div>


                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                        <button type="submit" class="btn btn-primary">inscription</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bas-page">
            <?php
            require_once('includes/footer.php');
            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/6c2421ea48.js" crossorigin="anonymous"></script>


    </body>
    </html>
