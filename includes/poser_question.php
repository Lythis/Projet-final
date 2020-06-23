<body class="bgP">
    <div class="cardP mr-md-9 m-card shadow-lg p-3">
        <div class="card-body">
            <div id="rafraiche">
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
                                
                                <p>Tu n'as pas trouvé une catégorie qui te correspond ? <br>Alors clique <a data-toggle="modal" data-target="#newCateg" class="text-primary"> ici</a> pour rajouter ta catégorie.</p>
                                <p>C'est toujours pas ce que tu veux faire. Tu veux supprimer une categorie alors? <br>Clique <a data-toggle="modal" data-target="#suppCateg" class="text-danger"> ici</a> pour supprimer une catégorie.</p></p>
                                <button type="submit" class="pBtn " name="poserquestion" value="valide">Envoyer</button>
                                </form>
                                <!-- Modal ajout categorie -->
                                <div class="modal fade" id="newCateg" tabindex="-1" role="dialog" aria-labelledby="newCategLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered " role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newCategLabel">nouvelle catégorie</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="margin-top: 2%;">
                                            <label for="validationTooltip01">Ajouter une catégorie :</label>
                                            <textarea id="categQuestion" type="text" class="form-control autoExpand w-100 h-50" placeholder="Cette catégorie sera utilisable une fois ajoutée." name="newCategorie" maxlength="150" required></textarea>
                                            <p style="text-align:right" id="compteur2">0 mots | 0 Caractere / 150</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="pBtn w-50" name="ajoutCategorie" value="valide">Ajouter une catégorie</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <!-- Modal supp categorie -->
                                <div class="modal fade" id="suppCateg" tabindex="-1" role="dialog" aria-labelledby="suppCategLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered " role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="suppCategLabel">nouvelle catégorie</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="./delete.php" method="post">
                                    <div class="modal-body">
                                        <div style="margin-top: 2%;">
                                            <label for="validationTooltip01">Supprimer une catégorie :</label>
                                            <select class="custom-select mb-2" id="validationTooltip02" placeholder="Categorie" name="suppCategorie" required>
                                                <option value="">Selectionner une catégorie</option>
                                                <?php
                                                $categ = selectAllCategories("DESC");
                                                foreach($categ as $categorie){
                                                    ?>
                                                    <option value="<?php echo $categorie['Id_categorie'];?>"><?php echo $categorie['Libelle_categorie']; ?> </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    
                                        <button id="supp" type="submit" class="btn btn-danger mt-3"  name="supprimer" value=" <?php echo $_POST['suppCategorie'];?> ">Supprimer</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                            <?php } 
                                            var_dump($_POST['suppCategorie']);
                                            
                                           ?>
                                            
                                
                            </div>
                            
                        </div>
                    
                </div>
            </div>
        </div>
    </div>