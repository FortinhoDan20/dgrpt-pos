<?php
    session_start();

    require_once('../../database/dbConnect.php');

    $id=isset($_GET['id'])?$_GET['id']:0;

    $req = "SELECT * FROM assujetti LEFT JOIN user_T ON user_T.id = assujetti.idAgent WHERE num_quitt = '$id' ";
    $result = $bdd->query($req); 
    $data = $result->fetch();

    $num_quitt=$data['name'];
    $assujetti=$data['assujetti'];
    $generatingAct=$data['generatingAct'];
    $numberAct=$data['numberAct'];
    $amount=$data['amount'];
    $amountInLetter=$data['amountInLetter'];
    $lastname=$data['lastname'];
    

?>


<style>
    @media print{
        #imp{
            display: none;
        }
    }
</style>

<div class="container ">

<h6 class="text-center text-primary" style="font-size:12px"> <img src="../../img/im1.svg" alt="Logo université" width="50px" style="margin-left: 5px"> &ensp;REPUBLIQUE DEMOCRATIQUE DU CONGO</h6>
<p class="text-center" style="font-size:12px">PROVINCE DE LA TSHOPO </p>
<p class="text-center" style="font-size:12px">MINISTÈRE PROVINCIAL EN CHARGE DES FINANCES</p>
<hr style="border-bottom: solid 3px #000; width: 50px margin-left:100px">

<p class="text-center" style="font-size:12px"  >DIRECTION GENERALE DES RECETTES DELA PROVINCE DE LA TSHOPO <?=$annee;?></p>



<table border='0' class="p-3"  style="margin-left: 10%">
    <tr>
        <td>REÇU PT A N° :</td>
        <td></td>
        <td><?= $num_quitt; ?> <td>
    </tr>
        <tr>
        <td>ASSUJETTI:</td>
        <td><?= $assujetti; ?><td>
    </tr>
    <tr>
        <td>ACTE GÉNÉRAREUR :</td>
        <td><?= $generatingAct; ?> <td>
    </tr>
    <tr>
        <td>NOMBRE D'ACTES :</td>
        <td><?= $numberAct; ?> <td>
    </tr>
    <tr>
        <td>MONTANT PAYÉ :</td>
        <td><?= $amount; ?><td>
    </tr>
    <tr>
        <td>MONTANT (en lettre) :</td>
        <td><?= $amountInLetter; ?><td>
    </tr>
    <tr>
        <td>FAIT A :</td>
        <td></td>
        <td><td>
    </tr>
    <tr>
        <td>AGENT PERCEPETEUR:</td>
        <td><?= strtoupper($lastname); ?> <td>
    </tr>
    
</table>


</div>
<div class="mt-4">


