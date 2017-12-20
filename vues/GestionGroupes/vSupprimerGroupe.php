<?php
use modele\dao\GroupeDAO;
use modele\metier\Groupe;
use modele\dao\Bdd;
require_once __DIR__ . '/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");

// SUPPRIMER L'ÉTABLISSEMENT SÉLECTIONNÉ

$id = $_REQUEST['id'];  // Non obligatoire mais plus propre
$unGroupe = GroupeDAO::getOneById($id);
/* @var $unEtab Etablissement  */
$nom = $unGroupe->getNom();
echo "
    <div class='container'>
    <div class='jumbotron'>
<br><center>Voulez-vous vraiment supprimer l'établissement $nom ?
<h3><br>
<a href='cGestionGroupes.php?action=validerSupprimerGroup&id=$id'>Oui</a>
&nbsp; &nbsp; &nbsp; &nbsp;
<a href='cGestionGroupes.php?'>Non</a></h3>
</center>
        </div></div>";

include("includes/_fin.inc.php");


