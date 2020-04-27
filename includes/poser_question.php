<body class="bgP">
    <div class="cardP mr-md-9 m-card shadow-lg p-3">
        <div class="card-body">
            <div>
                <div class="form-group">
                    <form class="needs-validation" method="post" action="Questions.php" novalidate>
                        <div class="form-group">
                            <div class="col-lg">
                                <label for="validationTooltip01">Votre question :</label>
                                <textarea id="question" type="text" class="form-control autoExpand w-100 h-50" placeholder="" name="question" maxlength="250" required></textarea>
                                
                                <p style="text-align:right" id="compteur">0 mots | 0 Caractere / 250</p>
                                <div class="invalid-feedback mb-2">
                                    Veuillez saisir une question.
                                </div>
                            </div>
                            <div class="col-lg">
                                <label for="validationTooltip02">Catégorie :</label>
                                <select class="custom-select mb-2" id="validationTooltip02" placeholder="Categorie" name="categorie" required>
                                    <option value="">Selectionner une catégorie</option>
                                    <option value="1">Anime</option>
                                    <option value="2">NSFW</option>
                                    <option value="3">Voiture</option>
                                    <option value="4">Informatique</option>
                                    <option value="5">Coronavirus</option>
                                    <option value="6">Politique</option>
                                    <option value="7">VM</option>
                                    <option value="8">Idols</option>
                                    <option value="9">K-Pop</option>
                                    <option value="10">Japon</option>
                                </select>
                                <div class="invalid-feedback mb-2">
                                    Veuillez selectionner une categorie.
                                </div>
                            </div>
                            <button type="submit" class="pBtn " name="poserquestion" value="valide">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>