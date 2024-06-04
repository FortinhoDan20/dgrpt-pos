<?php
      require_once('../../database/dbConnect.php');


      if(isset($_POST['create'])){

            extract($_POST);
            $status = "En activité";
            $headOfCollectorTrue = 1;
            
            $req ="INSERT INTO site (name, ticket, headOfCollector, statusST)value(?,?,?,?)";

            $params = array($name, $ticket, $headOfCollector, $status);

            $resultat = $bdd->prepare($req);

            $resultat->execute($params);

            $update ="UPDATE user_T SET headOfCollector=? WHERE id_user=?";

            $userParams =array($headOfCollectorTrue, $headOfCollector);
            $updateResult = $bdd->prepare($update);
            $updateResult->execute($userParams);      

            header ('location:../../pages/index.php?p=list-site');
      }