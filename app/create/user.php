<?php
      require_once('../../database/dbConnect.php');


      if(isset($_POST['create'])){

            extract($_POST);

            $status = "actif";

            $passWord = sha1($mdps);

            $req ="INSERT INTO user_T (firstname, lastname, sexe, roleUser, username,  mdps, status)value(?,?,?,?,?,?,?)";

            $params = array($firstname, $lastname, $sex, $role, $username, $passWord, $status);

            $result = $bdd->prepare($req);

            $result->execute($params);

            header ('location:../../pages/index.php?p=list-user');
      }