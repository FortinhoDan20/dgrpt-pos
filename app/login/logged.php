<?php
session_start();

require_once('../../database/dbConnect.php');


      if(isset($_POST['logged'])){

            extract($_POST);

            $pass = sha1($password);
            if(!empty('username') and !empty('password')) {
                
                

                $sql = "SELECT * FROM user_T LEFT JOIN role_user ON role_user.id_role = user_T.roleUser WHERE user_T.username='$username' AND user_T.mdps='$pass' ";
                $result = $bdd->query($sql);
                $req=$result->rowCount();


                  if($req > 0) {     

                    foreach( $result as $data ) {

                        $_SESSION['id'] = $data['id_user']; 
                        $_SESSION['firstname'] = $data['firstname'];
                        $_SESSION['lastname'] = $data['lastname'];
                        $_SESSION['role'] = $data['slug'];


                    if($_SESSION['role'] == "user"){

                        header("Location:../../pages/index.php?p=add-assujetti");

                    }else if($_SESSION['role'] == "admin"){

                        header("Location:../../pages/index.php?p=home");
                    }
                    else if($_SESSION['role'] == "gest"){

                        header("Location:../../pages/index.php?p=home");
                    }
                    }
                }else{
                header("Location:../../index.php?auth=failed");
            }  

            }
            
      }