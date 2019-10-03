<?php


namespace PPE\PpeBundle\Entity;

namespace PPE\PpeBundle\Entity;



use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity
 */
 class VehiculeCommerciale {
    
  /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private  $Id;
    
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $Marque;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $NbrPlace;
    
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $NumImmatricule;
    
    /**
     * @ORM\Column(type="float")
     */
    private $Kilomtetrage;
    
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $Modele;
    
    /**
     * @ORM\Column(type="date")
     */
    private $DateDachat;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $Carburant;
    
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $EtatVehicule;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $PuissanceFiscale;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $PuissanceMecanique;
    
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $Disponibilite;
    
     /**
     *@ORM\ManyToOne(targetEntity="PPE\GeParcBundle\Entity\Parc",inversedBy="vehiculecommerciale")
      * @ORM\JoinColumn(name="parc_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $parc; 
    
       
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $Commerce;
    function getId() {
        return $this->Id;
    }

    function getMarque() {
        return $this->Marque;
    }

    function getNbrPlace() {
        return $this->NbrPlace;
    }

    function getNumImmatricule() {
        return $this->NumImmatricule;
    }

    function getKilomtetrage() {
        return $this->Kilomtetrage;
    }

    function getModele() {
        return $this->Modele;
    }

    function getDateDachat() {
        return $this->DateDachat;
    }

    function getCarburant() {
        return $this->Carburant;
    }

    function getEtatVehicule() {
        return $this->EtatVehicule;
    }

    function getPuissanceFiscale() {
        return $this->PuissanceFiscale;
    }

    function getPuissanceMecanique() {
        return $this->PuissanceMecanique;
    }

    function getDisponibilite() {
        return $this->Disponibilite;
    }

    function getParc() {
        return $this->parc;
    }

    function getCommerce() {
        return $this->Commerce;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setMarque($Marque) {
        $this->Marque = $Marque;
    }

    function setNbrPlace($NbrPlace) {
        $this->NbrPlace = $NbrPlace;
    }

    function setNumImmatricule($NumImmatricule) {
        $this->NumImmatricule = $NumImmatricule;
    }

    function setKilomtetrage($Kilomtetrage) {
        $this->Kilomtetrage = $Kilomtetrage;
    }

    function setModele($Modele) {
        $this->Modele = $Modele;
    }

    function setDateDachat($DateDachat) {
        $this->DateDachat = $DateDachat;
    }

    function setCarburant($Carburant) {
        $this->Carburant = $Carburant;
    }

    function setEtatVehicule($EtatVehicule) {
        $this->EtatVehicule = $EtatVehicule;
    }

    function setPuissanceFiscale($PuissanceFiscale) {
        $this->PuissanceFiscale = $PuissanceFiscale;
    }

    function setPuissanceMecanique($PuissanceMecanique) {
        $this->PuissanceMecanique = $PuissanceMecanique;
    }

    function setDisponibilite($Disponibilite) {
        $this->Disponibilite = $Disponibilite;
    }

    function setParc($parc) {
        $this->parc = $parc;
    }

    function setCommerce($Commerce) {
        $this->Commerce = $Commerce;
    }


}
