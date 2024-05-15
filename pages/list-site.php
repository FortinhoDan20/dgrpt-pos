<?php
      require_once('../database/dbConnect.php');


$req = "SELECT * FROM site";

$result = $bdd->query($req);
?>

<div class="container-fluid px-4">
            <div class="card mt-4 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-header">
                                        <h4 class="mb-0">LISTE DE SITE DE LA DGRPT 
                                            <a href="../pages/index.php?p=add-site" class="btn btn-warning float-end" > NOUVEAU SITE</a>  </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered  " id="datatablesSimple">
                            <thead >
                                <tr>
                                    <th>N°</th>
                                    <th>NOM SITE</th>
                                    <th>NOMBRE DE TICKET PAR SITE</th>
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
                                    <td><?=strtoupper($row['name']) ;?></td>
                                    <td><?=$row['ticket'];?></td>
                                    <td>
                                        <?php 
                                            if($row['status'] == "En activité") {

                                        ?>  
                                        <span class="p-2 mb-2 bg-success text-white ">
                                            <?=$row['status'];?>
                                        </span> 
                                        <?php 
                                        }else{
                                            ?> 
                                        <span class="p-2 mb-2 bg-danger text-white ">
                                            <?=$row['status'];?>
                                        </span> 
                                        <?php 
                                        }
                                        ?>
                                    </td>
                                    
                                    <td class="text-center">

                                    <a class="btn btn-sm btn-outline-primary" href="dashboard.php?p=edituser&id=<?php echo $row['iduser']?>"><span class="fas fa-eye"></span> 
                                    </a> &nbsp;

                                    <?php 
                                            if($row['status'] == "En activité") {

                                        ?>  
                                        <a onclick="return confirm('ETES-VOUS SÛR DE VOULOIR FERMER LE SITE DE <?= $row['name'];?> ?')"
                                            class="btn btn-sm btn-outline-danger" href="">

                                            <span class="fas fa-lock"></span> 
                                        </a>
                                        <?php 
                                        }else{
                                            ?> 
                                        <a onclick="return confirm('ETES-VOUS SÛR DE VOULOIR OUVRIR LE SITE DE <?= $row['name'];?> ?')"
                                            class="btn btn-sm btn-outline-success" href="">

                                            <span class="fas fa-unlock-alt"></span> 
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