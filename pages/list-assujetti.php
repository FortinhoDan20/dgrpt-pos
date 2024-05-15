<?php
session_start();
      require_once('../database/dbConnect.php');

      $site = $_SESSION['site_id'];
    $req = "SELECT * FROM assujetti 
            LEFT JOIN user_T ON user_T.id = assujetti.idAgent 
            WHERE assujetti.site_id ='$site' 
            ORDER BY num_quitt DESC ";

            
    $result = $bdd->query($req);
?>


<div class="container-fluid px-4">
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">LISTE D'ASSUJETTISSEMENT 
                    <hr class="text-danger ">
                    <a href="../pages/index.php?p=add-assujetti" class="btn btn-warning float-end" > <i class="fa fa-plus-circle text-primary" aria-hidden="true"></i> NOUVEAU</a>  </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="datatablesSimple">
                            <thead >
                                <tr>
                                    <th>N°</th>
                                    <th>NUM QUITTANCE</th>
                                    <th>ASSUJETTI</th>
                                    <th>ACTE GENERATEUR</th>
                                    <th>Nbre D'ACTES</th>
                                    <th>MONTANT</th>
                                    <th>AGENT</th>
                                    <th>STATUS</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $i = 0;
                                foreach ($result as $row){
                                    $i++;

                            ?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td class="text-center"><?=$row['num_quitt'] ;?></td>
                                    <td><?=strtoupper($row['assujetti']) ;?></td>
                                    <td><?=strtoupper($row['generatingAct']) ;?></td>
                                    <td><?=strtoupper($row['numberAct']) ;?></td>
                                    <td><?= $row['amount'];?> FC </td>
                                    <td><?=strtoupper($row['lastname']) ;?></td>
                                    <td>
                                    <?php
                                        if($row['statusQT'] === "Imprimé"){

                                        ?>
                                            <span class="p-2 mb-2 bg-success text-white ">
                                            <?=$row['statusQT'];?>
                                            </span> 

                                        <?php
                                            } elseif ($row['statusQT'] === "En attente d'impression") {
                                        
                                        ?>
                                            <span class="p-2 mb-2 bg-warning text-white ">
                                            <?=$row['statusQT'];?>
                                            </span> 

                                        <?php
                                                
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                    <?php
                                        if($row['statusQT'] === "Imprimé"){

                                        ?>
                                            <a class="btn btn-sm btn-outline-success" href="../pages/index.php?p=wiew-assujetti&id=<?php echo $row['num_quitt']?>" ><span class="fas fa-eye"></span> 
                                          

                                        <?php
                                            } elseif ($row['statusQT'] === "En attente d'impression") {
                                        
                                        ?>
                                            <a class="btn btn-sm btn-outline-warning" href=".../../../app/file/print-assujetti.php?id=<?php echo $row['num_quitt']?>" ><span class="fas fa-print"></span> 
                                        </a>

                                        <?php
                                                
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php 

                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>