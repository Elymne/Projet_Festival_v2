<?php
use modele\metier\Groupe;
use modele\dao\GroupeDAO;
use modele\dao\AttributionDAO;
use modele\dao\Bdd;
require_once __DIR__.'/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");


// AFFICHER L'ENSEMBLE DES GROUPES
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// GROUPE

echo "
<br>
<div class='container'>
<div class='jumbotron'>
<table width='55%' cellspacing='0' cellpadding='0' class='table table-bordered' style='color=white'>

   <tr class='enTeteTabNonQuad'>
      <th colspan='4'><strong>Groupes</strong></th>
   </tr>";

$lesGroupes = GroupeDAO::getAll();
// BOUCLE SUR LES GROUPES
foreach ($lesGroupes as $unGroupe) {
    $id = $unGroupe->getId();
    $nom = $unGroupe->getNom();
    echo "
		<tr class='ligneTabNonQuad'>
         <td width='52%'>$nom</td>
         
         <td width='16%' align='center'> 
         <a href='cGestionGroupes.php?action=detailGrp&id=$id'>
         Voir détail</a></td>
      </tr>
      </div>
      </div>
            ";
}
/*
echo "
</table>
<br>
<a class='btn btn-primary btn-block' href='cGestionGroupes.php?action=demanderCreerGrp' role='button'>Ajouter un Groupe</a>
<h1><br_/><br_/></h1>";
*/

include("includes/_fin.inc.php");