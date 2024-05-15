<?php
    session_start();

    require_once('../../database/dbConnect.php');

        
      if(isset($_POST['create'])){

        extract($_POST);

   

        $site = $_SESSION['site_id'];

        $getSite = "SELECT * FROM site WHERE id = '$site'";
        $result_site = $bdd->query($getSite);
        $data = $result_site->fetch();
        $ticket = $data['ticket'];
        $ticketLeft = $ticket - 1 ;


        $update ="UPDATE site SET ticket=? WHERE id=?";

        $siteParams =array($ticketLeft, $site);
        $updateResult = $bdd->prepare($update);
        $updateResult->execute($siteParams);
 
       if($ticketLeft > 0){

            $month = date('m');
            $year = date('Y');
            $status = "En attente d'impression";

    
           // $insert = "INSERT INTO assujetti (assujett,generatingAct) VALUE(?,) ";
    
          $req ="INSERT INTO assujetti (assujetti, generatingAct, numberAct, amount, amountInLetter, idAgent, site_id, month, year, statusQT)
                  value(?,?,?,?,?,?,?,?,?,?)";
    
          $params = array($assujetti, $generatingAct, $numberAct, $amount, $amountInLetter, $_SESSION['id'], $site, $month, $year, $status);
    
          $result = $bdd->prepare($req);

          $result->execute($params);

    
           /*  $result->execute($params);   */
               
    
            header ('location:../../pages/index.php?p=list-assujetti');
        }else{

            header ('location:../../pages/index.php?p=add-assujetti&ticket=failed');
        } 




  }