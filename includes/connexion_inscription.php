<div class="rowe2">
    <div class="col-sm-6">
        <div class="card4">
            <div class="card-body">
                <h5 class="card-title">Connexion</h5>
                <form action="connexion_inscription.php" method="post">
                    <div class="form-group">
                        <label for="InputEmail1">Adresse mail</label>
                        <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="" name="email">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="InputPassword1">Mot de passe</label>
                        <input type="password" class="form-control" id="InputPassword1" placeholder="" name="mdp">
                    </div>
                    <button type="submit" class="btn2 btn-primary" name="connexion" value="valide">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card4-2">
            <div class="card-body">
                <h5 class="card-title">Pas de compte? Alors inscris toi!</h5>
                <p class="card-text">Inscris toi afin de poser des questions.</p>
                <button type="button" class="btn2 btn-primary" data-toggle="modal" data-target="#inscription">
                    Inscription
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
                                <form class="needs-validation" novalidate action="connexion_inscription.php" method="post">
                                    
                                    <div class="form-row1">
                                        <div class=" mb-3">
                                            <label for="validationCustom01">Pseudo</label>
                                            <input type="text" class="form-control" id="validationCustom01" placeholder="" name="pseudoinscription" required>
                                            <div class="invalid-feedback">
                                                Veuillez entrer votre pseudo.
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <label for="validationCustom02">Adresse Email</label>
                                            <input type="email" class="form-control" id="validationCustom02" placeholder="" name="emailinscription" required>
                                            <div class="invalid-feedback">
                                                Veuillez entrer un email valide.
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <label for="validationCustomMDP">Mot de passe</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="validationCustomMDP" placeholder="" aria-describedby="inputGroupPrepend" name="mdpinscription" required>
                                                <div class="invalid-feedback">
                                                    Veuillez entrer un mot de passe valide.
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <label for="validationCustomMDP">Confirmation mot de passe</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="validationCustomMDP" placeholder="" aria-describedby="inputGroupPrepend" name="mdpinscriptionconfirm" required>
                                                <div class="invalid-feedback">
                                                    Veuillez saisir le même mot de passe.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationTooltip02">Genre :</label>
                                            <select class="custom-select mb-2" id="validationTooltip02" placeholder="Genre" name="genreInscription" required>
                                                <option value="">Selectionner une catégorie</option>
                                                <option value="Homme">Homme</option>
                                                <option value="Femme">Femme</option>
                                                <option value="Non-binaire">Non-binaire</option>
                                                <option value="Hélicoptère d'attaque">Hélicoptère d'attaque</option>
                                            </select>
                                            <div class="invalid-feedback mb-2">
                                                Veuillez sélectionner un genre.
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary" name="inscription" value="valide">Inscription</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>