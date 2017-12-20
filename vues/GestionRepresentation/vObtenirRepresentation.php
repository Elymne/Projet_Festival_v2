<?php
use modele\dao\RepresentationDAO;
use modele\dao\GroupeDAO;
use modele\dao\LieuDAO;
use modele\dao\Bdd;
require_once __DIR__.'/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");

// Variable contenant les informations du groupe.

$lesGroupes = GroupeDAO::getAll();
$nbGroupes = count($lesGroupes);
$lesLieux = LieuDAO::getAll();
$nbLieux = count($lesLieux);
$lesRepresentations = RepresentationDAO::getAll();
$nbRepresentations = count($lesRepresentations);

echo"<div class='page-header'>
    <h1 style='color:white';>Representation</h1>
   </div>
   <div class='container'>
    <div class='jumbotron'>
    ";

if ($nbGroupes != 0 && $nbLieux != 0 ){
     
    // BOUCLE SUR LES Date de représentation
    $test = 0;
    $dateTest = "0";
    foreach ($lesRepresentations as $uneRepresentation) {
        $dateRepresentation = $uneRepresentation->getDateRep();
        
        if($dateRepresentation != $dateTest){
            if($test == 1){
                echo"</table><br>";
            }
            $dateTest = $dateRepresentation;
            echo "<strong>$dateRepresentation</strong><br>
         <table width='45%' cellspacing='0' cellpadding='0' class='table table-bordered'>";
            echo "
         <tr class='enTeteTabQuad'>
            <th width='30%'>Lieu</th>
            <th width='30%'>Groupe</th>
            <th width='20%'>Heure Début</th>
            <th width='20%'>HeureFin</th>
         </tr>";
        }
        
        echo " 
            <tr class='ligneTabQuad'>
            <td>".$uneRepresentation->getLieu()->getNom()."</td>
            <td>".$uneRepresentation->getGroupe()->getNom()."</td>
            <td><center>".$uneRepresentation->getHeureDebut()."</center></td>
            <td><center>".$uneRepresentation->getHeureFin()."</center></td>";
        
            if($test == 0){
                $test = 1;
            }
    }
     
        
}
