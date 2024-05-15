<?php
/*
try{
    $bdd = new PDO ('mysql:host=localhost;dbname=db-st-augustin','root',' ', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));    

}

catch (PDOException $e){
    echo "Impossible de se connecter avec la base de donnée ";
}
*/
$servername = "localhost";
$username = "root";
$password = "";

try {
  $bdd = new PDO("mysql:host=$servername;dbname=db-pos-dgrpt", $username, $password);
  // set the PDO error mode to exception
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}