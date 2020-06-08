<body class="bgP">
    <div class="cardP mr-md-9 m-card shadow-lg p-3">
        <div class="card-body">
            <div>
                <div class="form-group">
                    <form clas  method="post" action="Questions.php" novalidate>
                        <div class="form-group">
                            <div class="col-lg ">
                                <label for="validationTooltip01">Votre question :</label>
                                <textarea id="question" type="text" class="form-control autoExpand w-100 h-50" placeholder="" name="question" maxlength="250" required></textarea>
                                
                                <p style="text-align:right" id="compteur">0 mots | 0 Caractere / 250</p>
                                <div class="invalid-feedback mb-2">
                                    Veuillez saisir une question.
                                </div>
                            </div>
                            <div class="col-lg needs-validation">
                                <label for="validationTooltip02">Catégorie :</label>
                                <select class="custom-select mb-2" id="validationTooltip02" placeholder="Categorie" name="categorie" required>
                                    <option value="">Selectionner une catégorie</option>
                                    <?php
                                    $categ = selectAllCategories("DESC");
                                    foreach($categ as $categorie){
                                        ?>
                                        <option value="<?php echo $categorie['Id_categorie']; ?>"><?php echo $categorie['Libelle_categorie']; ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <?php if($_SESSION['utilisateur']['role'] == 1){?>
                                <div style="margin-top: 2%;">
                                <textarea id="categQuestion" type="text" class="form-control autoExpand w-100 h-50" placeholder="ajouter une categorie" name="newCategorie" maxlength="150" required></textarea>
                                <p style="text-align:right" id="compteur2">0 mots | 0 Caractere / 150</p>
                                </div>
                                <?php } ?>
                                
                            </div>
                            <button type="submit" class="pBtn " name="poserquestion" value="valide">Envoyer</button>
                            <?php if($_SESSION['utilisateur']['role'] == 1){?>
                            <button type="submit" class="pBtn " name="ajoutCategorie" value="valide">Ajouter une categorie</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>