<?php

$id=isset($_GET['id'])?$_GET['id']:0;

require_once('../database/dbConnect.php');


$req = "SELECT * FROM site LEFT JOIN user_T ON user_T.id_user = site.headOfCollector WHERE id_site = $id";
$result = $bdd->query($req);
$data = $result->fetch();
$site_name = $data['name'];
$ticket = $data['ticket'];
$firstname = $data['firstname'];
$lastname = $data['lastname'];
$status = $data['statusST'];
?>

<div class="container-fluid px-4">
            <div class="card mt-4 shadow-lg p-3 mb-5 bg-body rounded">
                
                <div class="card-header">
                <h4 class="mb-0">DETAILS DU SITE DE  <?php echo strtoupper($site_name) ?> 
                                            <a  onclick="return confirm('ETES-VOUS SÛR DE VOULOIR FERMER LE SITE DE <?= strtoupper($site_name);?> ?')" href="#" class="btn btn-danger float-end" > <span class="fas fa-lock"></span>  FERMER LE SITE</a>  </h4>
                </div>
                <div class="card-body">
                
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered  " >
                            <thead >

                                <tr>
                                    <th>NOM SITE :</th>
                                    <td><?php echo $site_name ?> </td>
                                </tr>
                                <tr>
                                    <th>TICKET PAR SITE</th>

                                    <td><?php echo $ticket ?> </td>
                                </tr>
                                <tr>
                                    <th>RECEVEUR</th>
                                    <td><?php echo $firstname ?> <?php echo $lastname ?> </td>
                                    </tr>
                                    <tr>
                                    <th>STATUS</th>
                                    <td><?php echo $status ?> </td>
                                    </tr>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
            <div class="card mt-4 shadow-lg p-3 mb-5 bg-body rounded">
                
                <div class="card-header">
                    <h4 class="mb-0">LISTE DES POSTES 
                <a href="../pages/index.php?p=add-post" class="btn btn-primary float-end" ><span class="fas fa-plus"></span> AJOUTER UN POSTE</a>  </h4>
                </div>
                <div class="card-body">
                
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered  " id="datatablesSimple">
                            <thead >
                                <tr>
                                    <th>N°</th>
                                    <th>NOM DU POSTE</th>
                                    <th>CHEF DE POSTE</th>
                                    <th>ORDONATEUR</th>
                                    <th>PERCEPTEUR</th>
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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