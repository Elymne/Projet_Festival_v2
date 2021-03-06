<?php
use modele\dao\TypeChambreDAO;
use modele\dao\AttributionDAO;
use modele\dao\Bdd;
require_once __DIR__ . '/../../includes/autoload.php';

include("includes/_debut.inc.php");

// AFFICHER L'ENSEMBLE DES TYPES DE CHAMBRES 
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR 
// TYPE DE CHAMBRE

echo "
<br>
<div class='jumbotron'>
<table width='40%' cellspacing='0' cellpadding='0' class='table table-bordered'>

   <tr class='enTeteTabNonQuad'>
   
      <th colspan='4'><strong>Types de chambres</strong></th>
   </tr>";
$lesTypesChambres = TypeChambreDAO::getAll();


// BOUCLE SUR LES TYPES DE CHAMBRES
foreach ($lesTypesChambres as $unTypeChambre) {
    $id = $unTypeChambre->getId();
    $libelle = $unTypeChambre->getLibelle();
    echo "
      <tr class='ligneTabNonQuad'> 
         <td width='15%'>$id</td>
         <td width='33%'>$libelle</td>
         <td width='26%' align='center'>
         
         <a href='cGestionTypesChambres.php?action=demanderModifierTypeChambre&id=$id'>
         Modifier</a></td>";

    // S'il existe déjà des attributions pour le type de chambre, il faudra
    // d'abord les supprimer avant de pouvoir supprimer le type de chambre
//    if (!existeAttributionsTypeChambre($connexion, $id)) {
    if (count(AttributionDAO::getAllByIdTypeChambre($id))==0) {
        echo "
            <td width='26%' align='center'>
            <a href='cGestionTypesChambres.php?action=demanderSupprimerTypeChambre&id=$id'>
            Supprimer</a></td>";
    } else {
        echo "<td width='26%'>&nbsp; </td>";
    }
    echo "               
    </tr>";
}
echo "    
</table>
<a class='btn btn-primary btn-block' href='cGestionTypesChambres.php?action=demanderCreerTypeChambre' role='button'>demanderCreerTypeChambre</a>
</div><br>";

include("includes/_fin.inc.php");

