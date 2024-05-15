<?php
      require_once('../../database/dbConnect.php');


      if(isset($_POST['create'])){

            extract($_POST);
            $status = "En activité";
            
            $req ="INSERT INTO site (name, ticket, status)value(?,?,?)";

            $params = array($name, $ticket, $status);

            $resultat = $bdd->prepare($req);

            $resultat->execute($params);

            header ('location:../../pages/index.php?p=list-site');
      }