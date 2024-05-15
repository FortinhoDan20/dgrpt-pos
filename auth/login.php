<?php 

$flash=isset($_GET['auth'])?$_GET['auth']:"";

$msg = "Echec d'authentification vérifier le mot de passe ou votre identifiant est incorrect";

if($flash){

  echo "<div class='alert alert-danger text-center' role='alert'>$msg</div>";
}
  
?>
  <div class="container px-4 " style=" margin-top: 240px;">
    <div class="row">
        <div class="col-md-4 mb-3"></div>
        <div class="col-md-4 mb-3">
        <div class="card mt-4 shadow-lg p-3 mb-5 bg-body rounded">
                  <div class="card-header">
                      <h6 class="mb-0 text-center p-3">DGRPT | AUTHENTIFICATION
                  </div>
                  <div class="card-body">
                      <form action="app/login/logged.php" method="POST">
                          <div class="row">
  
                                  <div class="col-md-12 mb-3 p-2">
                                      <label for="">IDENTIFIANT <span class="text-danger">*</span></label>
                                      <input type="text" name="username" placeholder="Entrez votre nom utilisateur" required class="form-control" />
                                  </div>
  
                                  <div class="col-md-12 mb-3 p-2">
                                      <label for="">MOT DE PASSE <span class="text-danger">*</span></label>
                                      <input type="password" placeholder="Entrez votre mot de passe" name="password" required class="form-control" />
                                  </div>
  
                                  <div class="col-md-12 mb-3 p-2">
                                      <button type="submit" name="logged"class="btn btn-warning my-2 my-sm-0 ">SE CONNECTER</button>
                                  </div>
                          </div>
                     </form>
                  </div>
              </div>
  
        </div>
        <div class="col-md-4 mb-3"></div>
  
    </div>
  </div>


   