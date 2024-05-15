

<div class="container-fluid px-4 ">

<?php 

$flash=isset($_GET['ticket'])?$_GET['ticket']:"";

$msg = "Les quittances sont epuisées. Veuillez contactez le service Informatique";

if($flash){

  echo "<div class='alert alert-warning text-center mt-3' role='alert'>$msg</div>";
}
  
?>
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">ASSUJETTISSEMENT
                    <hr class="text-danger ">
                    <a href="../pages/index.php?p=list-assujetti" class="btn btn-warning float-end"> <i class="fa fa-arrow-left text-primary" aria-hidden="true"></i> RETOUR</a> </a>  </h4>
                </div>
                <div class="card-body">
                <form action=".../../../app/create/assujetti.php" method="POST">
                   <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Assujetti <span class="text-danger">*</span></label>
                        <input type="text" name="assujetti" required class="form-control" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Acte générateur <span class="text-danger">*</span></label>
                        <input type="text" name="generatingAct" required class="form-control" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Nombre d'actes <span class="text-danger">*</span></label>
                        <input type="text" name="numberAct" required class="form-control" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Montant en Chiffre </label>
                        <input type="number" name="amount" class="form-control" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Montant en lettre </label>
                        <input type="text" name="amountInLetter" class="form-control" />
                    </div>

                    <div class="col-md-12 mb-3">
                    <button type="submit" name="create"class="btn btn-warning "> <i class="fa fa-save text-primary" aria-hidden="true"></i> ENREGISTRER </button>
                    </div>
                   </div>
                </form>
                </div>
            </div>
        </div>