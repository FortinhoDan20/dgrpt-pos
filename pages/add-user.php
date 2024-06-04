<?php
      require_once('../database/dbConnect.php');


$req = "SELECT * FROM role_user";

$result = $bdd->query($req);
?>



<div class="container px-4 ">
            <div class="card mt-4 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0 ">FORMULAIRE UTILISATEUR
                        
                    <hr class="text-danger ">
                    <a href="../pages/index.php?p=list-user" class="btn btn-warning float-end" > <i class="fa fa-arrow-left text-primary" aria-hidden="true"></i> RETOUR</a>  </h4>
                </div>
                <div class="card-body">
                    <form action=".../../../app/create/user.php" method="POST">
                        <div class="row">
                            
                                <div class="col-md-12 mb-3">
                                    <label for="">Prénom <span class="text-danger">*</span></label>
                                    <input type="text" name="firstname" required class="form-control" />
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Nom & Postnom<span class="text-danger">*</span></label>
                                    <input type="text" name="lastname" required class="form-control" />
                                </div>


                                <div class="col-md-12 mb-3 mt-3">
                                    <select name="sex" class="form-control">
                                    <option selected >Choosissez le genre</option>
                                    <option value="M">Masculin</option>
                                    <option value="F">Feminin</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Rôle Utilisateur <span class="text-danger">*</span></label>
                                    <select name="role" class="form-control">
                                        <option selected >Rôle Utilisateur</option>
                                        <?php 

                                            foreach ($result as $row) {?>
                                            <option value="<?=$row['id_role'];?>"><?=$row['name'];?></option>

                                            <?php
                                            }
                                            ?>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Identifiant <span class="text-danger">*</span></label>
                                    <input type="text" name="username" required class="form-control" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="mdps" required class="form-control" />
                                </div>

                               

                                <div class="col-md-12 mb-3">
                                <button type="submit" name="create"class="btn btn-warning "> <i class="fa fa-save text-primary" aria-hidden="true"></i> ENREGISTRER UTILISATEUR</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>