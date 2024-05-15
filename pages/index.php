<?php 
session_start();
if (isset($_SESSION['id'])) {

   $user = $_SESSION['lastname'];
   $id = $_SESSION['id'];

}
if(!empty($user)){

   include("../utilis/header.php");
   include("../utilis/navbar.php") ;
   
   include("../utilis/sidebar.php") ;

?>
<div id="layoutSidenav_content">
   <main>

<?php 

  include ((isset($_GET['p'])?$_GET['p']:'home').'.php');
  $content_for_layout =ob_get_clean();

  echo $content_for_layout;

}else {

   // code...
   header('location:../forbidden.php');
}
?>
</main>
 <?php include("../utilis/footer.php")?>