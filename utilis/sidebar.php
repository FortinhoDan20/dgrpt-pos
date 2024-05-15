<?php 
session_start();
if (isset($_SESSION['id'])) {

   $role = $_SESSION['roleUser'];
  

}
?>



<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark " id="sidenavAccordion" >
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">DGRPT</div>
                            <?php
                            if($role === "admin") {
                                ?>

                            <a class="nav-link" href="../pages/index.php?p=home">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <?php
                            }
                            ?>

                            
                            <?php

                            if($role === "admin"){

                            ?>

                            <div class="sb-sidenav-menu-heading">Gestion des sites</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSite" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Nos sites
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseSite" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../pages/index.php?p=add-site">Nouveau site</a>
                                    <a class="nav-link" href="../pages/index.php?p=list-site">Liste de site</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Gestion d'assujesttissement</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAss" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Assujettis
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseAss" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../pages/index.php?p=add-assujetti">Nouvel assujetti</a>
                                    <a class="nav-link" href="../pages/index.php?p=list-assujetti">Liste des assujettis</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Gestion de recettes</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRec" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Recettes 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseRec" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../pages/index.php?p=list-recettes">Recettes</a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Gestion Utilisateur</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Utilisateur
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../pages/index.php?p=add-user">Nouvel Utilisateur</a>
                                    <a class="nav-link" href="../pages/index.php?p=list-user">Liste utilisateurs</a>
                                </nav>
                            </div>


                            <?php

                            }else if($role === "admin" && $role === "receveur"){

                            ?>

                            <div class="sb-sidenav-menu-heading">Gestion de recettes</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRec" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Recettes 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseRec" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../pages/index.php?p=add-assujetti">Par site</a>
                                    <a class="nav-link" href="../pages/index.php?p=list-assujetti">Par Année</a>
                                    <a class="nav-link" href="../pages/index.php?p=list-assujetti">A une date donnée</a>
                                </nav>
                            </div>

                            <?php

                            }else{
                            
                            
                            ?>

                            <div class="sb-sidenav-menu-heading">Gestion d'assujesttissement</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAss" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Assujettis
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseAss" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../pages/index.php?p=add-assujetti">Nouvel assujetti</a>
                                    <a class="nav-link" href="../pages/index.php?p=list-assujetti">Liste des assujettis</a>
                                </nav>
                            </div>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">CONNECTÉ(E) étant que:</div>
                        <?=strtoupper($role)?>
                    </div>
                </nav>
            </div>