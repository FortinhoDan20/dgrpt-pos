<?php
session_start();

require_once('../../database/dbConnect.php');


      if(isset($_POST['logged'])){

            extract($_POST);

            $pass = sha1($password);
            if(!empty('username') and !empty('password')) {
                
                

                $sql = "SELECT * FROM user_T LEFT JOIN site ON site.id = user_T.site_id WHERE user_T.username='$username' AND user_T.mdps='$pass' ";
                $result = $bdd->query($sql);
                $req=$result->rowCount();


                  if($req > 0) {     

                    foreach( $result as $data ) {

                        $_SESSION['id'] = $data['id']; 
                        $_SESSION['firstname'] = $data['firstname'];
                        $_SESSION['lastname'] = $data['lastname'];
                        $_SESSION['roleUser'] = $data['roleUser'];
                        $_SESSION['site_id'] = $data['site_id'];
                        $_SESSION['start'] = time();
                        $_SESSION['duration'] = $duration;

                  /*      $logMessage = `l'(e) $data['roleUser'] $data['firstname'] $data['lastname'] se connecté(e) à $date `;
                        $status = "logged";
                        $date=date(NOW());

                        $log ="INSERT INTO log (user_id, logMessage, status)value(?,?,?)";
                        params = array($data['id'], $logMessage, $status);
                        $resultLog = $bdd->prepare($req);
                        $resultLog->execute($params);
                    */

                    if($_SESSION['roleUser'] == "agent"){

                        header("Location:../../pages/index.php?p=add-assujetti");

                    }else if($_SESSION['roleUser'] == "admin"){

                        header("Location:../../pages/index.php?p=home");
                    }
                    }
                }else{
                header("Location:../../index.php?auth=failed");
            }  

            }
            
      }