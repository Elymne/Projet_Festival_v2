<?php
use modele\dao\GroupeDAO;
use modele\metier\Groupe;
use modele\dao\Bdd;
require_once __DIR__.'/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");



if ($action == 'demanderCreerGrp') {
    $id = '';
    $nom = '';
    $responsable = '';
    $nbPers = 0;
    $pays = '';
    $hebergement = '';
    $adressePostale = '';
}
// S'il s'agit d'une modification et qu'on ne "vient" pas de ce formulaire, il
// faut récupérer les données sinon on affichera les valeurs précédemment 
// saisies
if ($action == 'demanderModifierGrp') {
    $unGroupe = GroupeDAO::getOneById($id);
    /* @var $unEtab Etablissement  */
    $nom = $unGroupe->getNom();
    $responsable = $unGroupe->getResponsable();
    $nbPers = $unGroupe->getNbPers();
    $pays = $unGroupe->getNomPays();
    $hebergement = $unGroupe->getHebergement();
    $adressePostale = $unGroupe->getAdresse();
}

// Initialisations en fonction du mode (création ou modification) 
if ($action == 'demanderCreerGrp' || $action == 'demanderModifierGrp') {
    $creation = true;
    $message = "Nouveau Groupe";  // Alimentation du message de l'en-tête
    $action = "validerCreerGrp";
} else {
    $creation = false;
    $message = "$nom ($id)";            // Alimentation du message de l'en-tête
    $action = "validerModifierGrp";
}

echo "
    <div class='container'>
    <div class='jumbotron'>
<form method='POST' action='cGestionGroupes.php?'>
   <input type='hidden' value='$action' name='action'>
   <br>
   <table width='85%' cellspacing='0' cellpadding='0' class='table table-bordered'>
   
      <tr class='enTeteTabNonQuad'>
         <td colspan='3'><strong>$message</strong></td>
      </tr>";

// En cas de création, l'id est accessible sinon l'id est dans un champ
// caché               
if ($creation) {
    // On utilise les guillemets comme délimiteur de champ dans l'echo afin
    // de ne pas perdre les éventuelles quotes saisies (même si les quotes
    // ne sont pas acceptées dans l'id, on a le souci de ré-afficher l'id
    // tel qu'il a été saisi) 
    echo '
         <tr>
            <td> Id*: </td>
            <td><input type="text" value="' . $id . '" name="id" size ="10" 
            maxlength="8"></td>
         </tr>';
} else {
    echo "
         <tr>
            <td><input type='hidden' value='$id' name='id'></td><td></td>   
         </tr>";
}
echo '
      <tr>
         <td> Nom*: </td>
         <td><input type="text" value="' . $nom . '" name="nom" size="50" 
         maxlength="45"></td>
      </tr>
      <tr>
         <td> Responsable : </td>
         <td><input type="text" value="' . $responsable . '" name="responsable" 
         size="50" maxlength="45"></td>
      </tr>
      <tr class=>
         <td> Pays : </td>
         <td><input type="text" value="' . $pays . '" name="pays" 
         size="7" maxlength="5"></td>
      </tr>
      <tr>
         <td> Adresse Postale : </td>
         <td><input type="text" value="' . $adressePostale . '" name="adresse" 
         maxlength="35"></td>
      </tr>
      <tr>
         <td> Nombre de Personnes*: </td>
         <td><input type="text" value="' . $nbPers . '" name="nbPers" 
         maxlength="10"></td> 
      </tr>
      <tr>
         <td> Hebergement*: </td>
         <td><input type="text" value="' . $hebergement . '" name="hebergement"
             maxlength="70"></td>
      </tr>
   </table>';
echo "
   <table align='center' cellspacing='15' cellpadding='0'>
      <tr>
         <td align='right'><input type='submit' value='Valider' name='valider'>
         </td>
         <td align='left'><input type='reset' value='Annuler' name='annuler'>
         </td>
      </tr>
      <a class='btn btn-primary btn-block' href='cGestionGroupes.php' role='button'>Retour</a>
   </table>
</form>
</div>";

include("includes/_fin.inc.php");