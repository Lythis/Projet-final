<div class="change-image">
    <img class="image-edit  img-fluid  picture-user" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>">

    <label for="file" class="label-file">Choisir une image</label>
    <input id="file" class="input-file" type="file">

    <button class=" btn-edit text-dark"> Supprimer image </button>
</div>
<div class="edit-profil">
    <div class="card-body">
        <form>
        <div>
            <label for="exampleInputEmail1">Pseudo : </label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_SESSION['utilisateur']['pseudo']; ?>">
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
    
        <div>
            <label for="exampleInputPassword1">Description :</label>
            <textarea type="text" class="form-control autoExpand w-100" value="<?php echo $users[0]["Description_profil"];?> " name="descriptionProfil" required></textarea>
        </div>
        <div >
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
        <button type="submit" class="btn btn-primary" name="inscription" value="valide">Accepter</button>
        </form>
    </div>
</div>