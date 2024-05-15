<?php
      require_once('../../database/dbConnect.php');


      if(isset($_POST['create'])){

            extract($_POST);

            $status = "actif";

            $passWord = sha1($mdps);

            $req ="INSERT INTO user_T (firstname, lastname, phone, sexe, site_id, username, roleUser, mdps, status)value(?,?,?,?,?,?,?,?,?)";

            $params = array($firstname, $lastname, $phone, $sex, $site, $username, $role, $passWord, $status);

            $result = $bdd->prepare($req);

            $result->execute($params);

            header ('location:../../pages/index.php?p=list-user');
      }