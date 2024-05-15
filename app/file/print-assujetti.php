<?php
    session_start();

    require_once('../../database/dbConnect.php');

    $id=isset($_GET['id'])?$_GET['id']:0;

	if($id){

		$status = "Imprimé";
		$update ="UPDATE assujetti SET statusQT=? WHERE num_quitt=?";

        $siteParams =array($status, $id);
        $updateResult = $bdd->prepare($update);
        $updateResult->execute($siteParams);

	}

    $req = "SELECT * FROM assujetti 
        LEFT JOIN user_T ON user_T.id = assujetti.idAgent WHERE num_quitt = '$id' ";
    $result = $bdd->query($req); 
    $data = $result->fetch();


    
    $num_quitt=$data['num_quitt'];
    $assujetti=$data['assujetti'];
    $generatingAct=$data['generatingAct'];
    $numberAct=$data['numberAct'];
    $amount=$data['amount'];
    $date=$data['createdAt'];
    $amountInLetter=$data['amountInLetter'];
    $lastname=$data['lastname'];
    $siteId = $data['site_id'];
   

    $site = "SELECT * FROM site WHERE id = '$siteId'";
    $response = $bdd->query($site); 
    $dataSite = $response->fetch();
    $siteName = $dataSite['name']; 
?>



<style>
    @media print{
        #imp{
            display: none;
        }
    }
</style>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>PRINT</title>
  </head>
  <body>
<div class="container">
<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body p-0">
					<div class="invoice-container">
						<div class="invoice-header">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="custom-actions-btns mb-5">
									<a href="../../pages/index.php?p=list-assujetti" id="imp" class="btn btn-primary">
											<i class="icon-download"></i> RETOUR
										</a>

										<a href="#" id="imp" onclick='window.print();return false;' class="btn btn-success">
											<i class="icon-printer"></i> IMPRIMER
										</a>
									</div>
									
								</div>
							</div>
							<!-- Row end -->
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
									<p class="invoice-logo" style="font-size:12px"> REPUBLIQUE DEMOCRATIQUE DU CONGO <?= $siteName; ?> </p>
                                    <p style="font-size:12px">PROVINCE DE LA TSHOPO</p>
                                    <p style="font-size:12px">MINISTÈRE PROVINCIAL CHARGÉ DES FINANCES</p>
                                    
                                    <div class="row">
                                        <div class="col-2 col-sx"><img src="../../img/im1.svg" alt="Logo université" width="50px" style="margin-left: 5px"> &ensp;</div>
                                        <div class="col-2 col-sx"><img src="../../img/images.jpeg" alt="Logo université" width="50px" style="margin-left: 5px"> &ensp;</div>
                                      
                                    </div>
								</div>
			
							</div>
							<!-- Row end -->
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
									<div class="invoice-details">
										<address>
                                        <div class=" p-4">REÇU PT A N° <?= $num_quitt; ?></div>
										</address>
									</div>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
									<div class="invoice-details">
										<div class="invoice-num">
											
											<div class="text-center">MONTANT EN CHIFFRE <h6 class="border border-dark p-3"> FC <?= $amount; ?></h6></div> 
                                           
										</div>
									</div>													
								</div>
							</div>
							<!-- Row end -->
						</div>
						<div class="invoice-body">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="table-responsive">
										<table class="table custom-table m-0" border='0'>

											<tbody>
												<tr>
													<td>
														Assujetti :
													
													</td>
													<td><?= strtoupper($assujetti); ?></td>
													
												</tr>
												<tr>
													<td>
														Acte Générateur :

													</td>
													<td><?= strtoupper($generatingAct); ?></td>
													
												</tr>
												<tr>
													<td>
														Nombre d'actes :

													</td>
													<td><?= strtoupper($numberAct); ?></td>
													
												</tr>
                                                <tr>
													<td>
														Montant (en lettre) :

													</td>
													<td><?= strtoupper($amountInLetter); ?></td>
													
												</tr>
                                                <tr>
													<td>
														Délivrer à :

													</td>
													<td><?= strtoupper($siteName); ?></td>
													
												</tr>
                                                <tr>
													<td>
														Delivrer par :

													</td>
													<td><?= strtoupper($lastname); ?></td>
													
												</tr>
                                                <tr>
													<td>
														Delivrer le :

													</td>
													<td><?= $date; ?></td>
													
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- Row end -->
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>