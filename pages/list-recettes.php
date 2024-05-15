<?php
session_start();
      require_once('../database/dbConnect.php');

        $reqSite = "SELECT * FROM site";
        $resultSite = $bdd->query($reqSite);


      if(isset($_POST['filter'])){

        extract($_POST);
        $site = $_POST['site'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $total_recette = 0;

        if($site == "all"){

            $req = "SELECT * FROM assujetti  WHERE createdAtAss BETWEEN '$start' AND  '$end'";   
                      
            $result = $bdd->query($req);
            $resultat = $bdd->query($req);
            foreach ($resultat as $tot){
                $total_recette = $total_recette + $tot['amount'];
            
            }
            
        
        }else{
            $req = "SELECT * FROM assujetti  WHERE site_id ='$site' AND createdAtAss BETWEEN '$start' AND  '$end'";   
                      
            $result = $bdd->query($req);
            $resultat = $bdd->query($req);
            foreach ($resultat as $tot){
                $total_recette = $total_recette + $tot['amount'];
            
            }
            
        }
      
        
    
    }else {

          $req = "SELECT * FROM assujetti  ";    
          $result = $bdd->query($req);
          $resultat = $bdd->query($req);
      
          $reqSite = "SELECT * FROM site";

          $resultSite = $bdd->query($reqSite);


          foreach ($resultat as $tot){
            $total_recette = $total_recette + $tot['amount'];
        
        }
      }

   
?>


<div class="container-fluid px-4">
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-dark text-white">
                    
                    <div class="row ">
                        <div class="col-md-2">
                            <p>Recettes : <?= number_format($total_recette, 2, ',', ' ');?> FC</p>
                        </div>
                        <div class="col-md-10">
                            <form action="./index.php?p=list-recettes" method="POST">
                                <div class="row">
                                    <div class="col-md-3 float-end">
                                    <label for="" style="font-size:12px">SITE </label>
                                    <select name="site" class="form-control">
                                        <option  selected>Choosissez le site</option>
                                        <option value="all">Tous les sites</option>
                                        <?php 

                                            foreach ($resultSite as $data) {?>
                                            <option value="<?=$data['id'];?>"><?=$data['name'];?></option>

                                            <?php
                                            }
                                            ?>
                                    </select>
                                    </div>
                                    <div class="col-md-3">
                                    <label for="" style="font-size:12px">Date début </label>
                                        <input type="date"  name="start" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                    <label for="" style="font-size:12px">Date fin </label>
                                        <input type="date" name="end" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                    
                                    <button type="submit" name="filter" class="btn btn-warning mt-4"> <i class="fa fa-filter text-primary" aria-hidden="true"></i> filter</button>
                                   
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="text-danger ">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="datatablesSimple">
                            <thead >
                                <tr>
                                    <th>N°</th>
                                    <th>SITE</th>
                                    <th>ASSUJETTI</th>
                                    <th>ACTE GENERATEUR</th>
                                    <th>Nbre D'ACTES</th>
                                    <th>MONTANT</th>
                                    <th>DATES</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $i = 0;
                                $total = 0;
                                foreach ($result as $row){
                                    $i++;
                                $total = $total + $row['amount']
                            ?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td class="text-center"><?=$row['num_quitt'] ;?></td>
                                    <td><?=strtoupper($row['assujetti']) ;?></td>
                                    <td><?=strtoupper($row['generatingAct']) ;?></td>
                                    <td><?=strtoupper($row['numberAct']) ;?></td>
                                    <td><?= number_format($row['amount'], 2, ',', ' ');?> FC </td>
                                    <td><?=$row['createdAtAss'] ;?></td>
                                    


 
                                </tr>
                            <?php 

                                }
                                ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>