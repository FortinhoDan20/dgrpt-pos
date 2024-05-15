<?php
session_start();
      require_once('../database/dbConnect.php');

        $total_year = 0;
        $year = date('Y');


          $req = "SELECT * FROM assujetti WHERE year = '$year' ";    
          $result = $bdd->query($req);
          $resultat = $bdd->query($req);


          foreach ($resultat as $tot){
            $total_recette = $total_recette + $tot['amount'];
        
        }

   
?>


<div class="container-fluid px-4">
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-dark text-white">
                    <p>RECETTE ANNÉE EN COUR: <?php echo $date = date('Y') ;?> </p>
                    <p class="float-end">Recettes : <?= number_format($total_recette, 2, ',', ' ');?> FC</p>                    
 
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