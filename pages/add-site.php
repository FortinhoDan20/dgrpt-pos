<?php
    require_once('../database/dbConnect.php');


    $req = "SELECT * FROM user_T WHERE roleUser = 3 ";

    $result = $bdd->query($req);
?>

<div class="container px-4 ">
            <div class="card mt-4 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h4 class="mb-0">FORMULAIRE DE SITE
                    <a href="../pages/index.php?p=list-site" class="btn btn-warning float-end" > Back</a>  </h4>
                </div>
                <div class="card-body">
                    <form action=".../../../app/create/site.php" method="POST">
                        <div class="row">

                                <div class="col-md-12 mb-3">
                                    <label for="">Nom du site <span class="text-danger">*</span></label>
                                    <input type="text" name="name" required class="form-control" />
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Nombre de ticket <span class="text-danger">*</span></label>
                                    <input type="number" name="ticket" required class="form-control" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Receveur <span class="text-danger">*</span></label>
                                    <select name="headOfCollector" class="form-control">
                                        <option selected >Choisissez un receveur pour ce site</option>
                                        <?php 

                                            foreach ($result as $row) {?>
                                            <option value="<?=$row['id_user'];?>"><?=$row['firstname'];?> <?=$row['lastname'];?></option>

                                            <?php
                                            }
                                            ?>
                                    </select>
                                </div>


                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="create"class="btn btn-warning ">ENREGISTRER SITE</button>
                                </div>
                        </div>
                   </form>
                </div>
            </div>
        </div>