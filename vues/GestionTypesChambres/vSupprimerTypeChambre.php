<?php

include("includes/_debut.inc.php");

// SUPPRIMER LE TYPE DE CHAMBRE SÉLECTIONNÉ

$id = $_REQUEST['id'];  // Non obligatoire mais plus propre
echo "
    <div class='jumbotron' style='background-color:white;'>
<br><center>Voulez-vous vraiment supprimer le type de chambre $id ?
<h3><br>
<a href='cGestionTypesChambres.php?action=validerSupprimerTypeChambre&id=$id'>
Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
<a href='cGestionTypesChambres.php'>Non</a></h3></center>
</div>"
        ;

include("includes/_fin.inc.php");

