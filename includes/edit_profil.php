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
            <label >Pseudo : </label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $users[0]["Pseudo_profil"]; ?>">
        </div>
        <div>
            <label >E-mail : </label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $users[0]["Mail_profil"]; ?>">
        </div>
        <div class=" mb-3">
            <label >Ancien mot de passe : </label>
            <div class="input-group">
                <input type="password" class="form-control" placeholder="" aria-describedby="inputGroupPrepend" name="mdpinscription" required>
            </div>
        </div>
        <div class=" mb-3">
            <label>Nouveau mot de passe : </label>
            <div class="input-group">
                <input type="password" class="form-control" id="validationCustomMDP" placeholder="" aria-describedby="inputGroupPrepend" name="mdpinscription" required>
            </div>
        </div>
        <div class=" mb-3">
            <label>Confirmation mot de passe : </label>
            <div class="input-group">
                <input type="password" class="form-control" id="validationCustomMDP" placeholder="" aria-describedby="inputGroupPrepend" name="mdpinscriptionconfirm" required>

            </div>
        </div>
    
        <div>
            <label >Description :</label>
            <textarea type="text" class="form-control autoExpand w-100" name="descriptionProfil" required> <?php echo $users[0]["Description_profil"]; ?> </textarea>
        </div>
        <div >
            <label >Genre :</label>
                <select class="custom-select mb-2"  value="<?php echo $users[0]["Genre_profil"];?>" name="genreInscription"  required>    
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                    <option value="Non-binaire">Non-binaire</option>
                    <option value="Hélicoptère d'attaque">Hélicoptère d'attaque</option>
                </select>

        </div>
    
        <button type="submit" class="btn btn-primary" name="inscription" value="valide">Accepter</button>
        </form>
    </div>
</div>
</div>