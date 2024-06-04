<?php
session_start();

if (isset($_SESSION['id'])) {

    $role = $_SESSION['role'];
   
 
 }

require_once('../database/dbConnect.php');

 $total_general = 0;
$total_year = 0;
$total_month = 0;
$total_current = 0; 

$date = date('Y-m-d');
$month = date('m');
$year = date('Y');

$req = "SELECT * FROM assujettissement";    
$result = $bdd->query($req);

foreach ($result as $row){
    $total_general = $total_general + $row['amount'];

}


$request = "SELECT * FROM assujettissement WHERE year = '$year' ";    
$resultYear = $bdd->query($request);

foreach ($resultYear as $year){
    $total_year = $total_year + $year['amount'];

}

$requestMont = "SELECT * FROM assujettissement WHERE month = '$month' ";    
$resultYear = $bdd->query($requestMont);

foreach ($resultYear as $month){
    $total_month = $total_month + $month['amount'];

}

$current = "SELECT * FROM assujettissement WHERE date_create = '$date' ";    
$resultCurrent = $bdd->query($current);

foreach ($resultCurrent as $current){
    $total_current = $total_current + $current['amount'];

}

$requests = "SELECT * FROM assujettissement 
LEFT JOIN site ON site.id_site = assujettissement.site
LEFT JOIN post ON post.id_post = assujettissement.post ";    
$results = $bdd->query($requests); 

?>


<div class="container-fluid px-4">
                        <h1 class="mt-4">Tableau de Board</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tableau de Board</li>
                        </ol>

                       
                        <?php 
                        if($role === "admin") {

                        ?>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">REVENU TOTALE <br> <h3 class="float-end">FC
                                         <?=number_format($total_general, 2, ',', ' ');?> 
                                        
                                        </h3> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Voir les Details  </a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"> REVENU ANNEE ENCOURS <br> <h3 class="float-end"> FC <?=number_format($total_year, 2, ',', ' ');?> </h3> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./index.php?p=current-year">Voir les Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">REVENU MOIS ENCOURS<br> <h3 class="float-end">FC  <?=number_format($total_month, 2, ',', ' ');?> </h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">REVENU JOURNALIER  <br> <h3 class="float-end">FC <?=number_format($total_current, 2, ',', ' ');?> </h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <?php

                        }else{
                        
                        ?>
<div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">RECETTE TOTALE <br> <h3 class="float-end">FC
                                         <?=number_format($total_general, 2, ',', ' ');?> 
                                        
                                        </h3> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Voir les Details  <?=$role;?>  </a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">ANNEE ENCOURS <br> <h3 class="float-end"> FC <?=number_format($total_year, 2, ',', ' ');?> </h3> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./index.php?p=current-year">Voir les Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">MOIS ENCOURS<br> <h3 class="float-end">FC  <?=number_format($total_month, 2, ',', ' ');?> </h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">JOURNALIÈRE  <br> <h3 class="float-end">FC <?=number_format($total_current, 2, ',', ' ');?> </h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <?php
                        }
                        
                        ?>
                        
                        <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <!-- données a ajoutée -->
                                  <!--   </div>
                                   
                                </div>
                            </div> -->
                            <!-- <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <!-- données a ajoutée -->
                                   <!--  </div>
                                   
                                </div>
                            </div> --> 
                      <!--   </div> - -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                RECETTES RECOLTES
                            </div>
                            <div class="card-body">
                            <table class="table table-striped table-bordered " id="datatablesSimple">
                            <thead  >
                                <tr>
                                    <th>N°</th>
                                    <th>SITE</th>
                                    <th>POSTE</th>
                                    <th>ASSUJETTI</th>
                                    <th>ACTE GENERATEUR</th>
                                    <th>Nbre D'ACTES</th>
                                    <th>TRESOR</th>
                                    <?php 
                                     if($role === "admin") {

                                    ?>
                                    <th>PARTENAIRE</th>
                                    <th>NET A PAYER</th>
                                    <?php 
                                     }
                                    
                                    ?>
                                    
                                    <th>DATES</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $i = 0;
                                $total = 0;
                                foreach ($results as $data){
                                    $i++;
                                $total = $total + $dta['amount']
                            ?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td class="text-center"><?=$data['name'] ;?></td>
                                    <td><?=strtoupper($data['post_name']) ;?></td>
                                    <td><?=strtoupper($data['assujetti']) ;?></td>
                                    <td><?=strtoupper($data['generatingAct']) ;?></td>
                                    <td><?=strtoupper($data['numberAct']) ;?></td>
                                    <td><?= number_format($data['amount'], 2, ',', ' ');?> FC </td>
                                    <?php 
                                     if($role === "admin") {

                                    ?>
                                    <td><?= number_format($data['amount'], 2, ',', ' ');?> FC </td>
                                    <td><?= number_format($data['amount'], 2, ',', ' ');?> FC </td>
                                    <td><?= number_format($data['amount'], 2, ',', ' ');?> FC </td>
                                    <?php 
                                     }
                                    
                                    ?>
                                    
                                    <td><?=$data['createdAtAss'] ;?></td>
                                    


 
                                </tr>
                            <?php 

                                }
                                ?>
                            </tbody>

                        </table>
                            </div>
                        </div>
                    </div>