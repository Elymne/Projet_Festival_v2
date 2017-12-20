<?php
namespace modele\metier;

/**
 * Description of Groupe
 * un groupe musical se produisant au festival
 * @author prof
 */
class Groupe {
    /**
     * identifiant du groupe ("gxxx")
     * @var string
     */
    private $id;
    /**
     * nom du groupe
     * @var string
     */
    private $nom;
    /**
     * nom du responsable du groupe
     * @var string 
     */
    private $responsable;
    /**
     * adresse du groupe
     * @var string
     */
    private $adresse;
    /**
     * effectif du groupe
     * @var integer
     */
    private $nbPers;
    /**
     * nom du pays d'origine
     * @var string 
     */
    private $nomPays;
    /**
     * Souhaite un hébergement (O/N)
     * @var char 
     */
    private $hebergement;

    function __construct($id, $nom, $responsable, $adresse, $nbPers, $nomPays, $hebergement) {
        $this->id = $id;
        $this->nom = $nom;
        $this->responsable = $responsable;
        $this->adresse = $adresse;
        $this->nbPers = $nbPers;
        $this->nomPays = $nomPays;
        $this->hebergement = $hebergement;
    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getResponsable() {
        return $this->responsable;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getNbPers() {
        return $this->nbPers;
    }

    function getNomPays() {
        return $this->nomPays;
    }

    function getHebergement() {
        return $this->hebergement;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setResponsable($responsable) {
        $this->responsable = $responsable;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setNbPers($nbPers) {
        $this->nbPers = $nbPers;
    }

    function setNomPays($nomPays) {
        $this->nomPays = $nomPays;
    }

    function setHebergement($hebergement) {
        $this->hebergement = $hebergement;
    }


}
