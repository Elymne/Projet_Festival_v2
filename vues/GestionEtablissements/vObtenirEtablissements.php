<?php
use modele\dao\EtablissementDAO;
use modele\dao\AttributionDAO;
use modele\dao\Bdd;
require_once __DIR__.'/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");

// AFFICHER L'ENSEMBLE DES ÉTABLISSEMENTS
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// ÉTABLISSEMENT

echo "
<br>
<div class='container'>
<div class='jumbotron''>
<table width='55%' cellspacing='0' cellpadding='0' class='table table-bordered'>
    <thead class='thead-default'>
        <tr>
            <th colspan='4'><strong>Etablissements</strong></th>
        </tr>
    </thread>";

$lesEtablissements = EtablissementDAO::getAll();
// BOUCLE SUR LES ÉTABLISSEMENTS
foreach ($lesEtablissements as $unEtablissement) {
    $id = $unEtablissement->getId();
    $nom = $unEtablissement->getNom();
    echo "
		<tr>
         <td width='52%'>$nom</td>
         
         <td width='16%' align='center'> 
         <a href='cGestionEtablissements.php?action=detailEtab&id=$id'>
         Voir détail</a></td>
         
         <td width='16%' align='center'> 
         <a href='cGestionEtablissements.php?action=demanderModifierEtab&id=$id'>
         Modifier</a></td>";

    // S'il existe déjà des attributions pour l'établissement, il faudra
    // d'abord les supprimer avant de pouvoir supprimer l'établissement
//    if (!existeAttributionsEtab($connexion, $id)) {
    $lesAttributionsDeCetEtablissement = AttributionDAO::getAllByIdEtab($id);
    if (count($lesAttributionsDeCetEtablissement)==0) {
        echo "
            <td width='16%' align='center'> 
            <a href='cGestionEtablissements.php?action=demanderSupprimerEtab&id=$id'>
            Supprimer</a></td>";
    } else {
        echo "
            <td width='16%'>&nbsp; </td>";
    }
    echo "
      </tr>";
}
echo "
</table>
<br>
<a class='btn btn-primary btn-block' href='cGestionEtablissements.php?action=demanderCreerEtab' role='button'>Création d'un établissement</a>
</div>
</div>
<br>";

include("includes/_fin.inc.php");

