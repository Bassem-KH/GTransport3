<?php


namespace PPE\GeParcBundle\Entity;

namespace PPE\GeParcBundle\Entity;


use Doctrine\ORM\Mapping as ORM;




/**
 * @ORM\Entity
 */
class Parc {
    
  /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private  $Id;
    
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $Description;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $EspaceMax;
    
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $Adresse;
    
    /**
     * @ORM\OneToMany(targetEntity="PPE\PpeBundle\Entity\VehiculeTransport", mappedBy="parc")
     *@ORM\JoinColumn(name="vehiculeTransport", referencedColumnName="Id")
     */
    private $vehiculeTransport;
    
    /**
     * @ORM\OneToMany(targetEntity="PPE\PpeBundle\Entity\VehiculeCommerciale", mappedBy="parc")
     *@ORM\JoinColumn(name="vehiculecommerciale", referencedColumnName="Id")
     */
    private $vehiculecommerciale;
    
    /**
     * @ORM\OneToMany(targetEntity="PPE\PpeBundle\Entity\VehiculePersennelle", mappedBy="parc")
     *@ORM\JoinColumn(name="vehiculepersennelle", referencedColumnName="Id")
     */
    private $vehiculepersennelle;
    function getId() {
        return $this->Id;
    }

    function getDescription() {
        return $this->Description;
    }

    function getEspaceMax() {
        return $this->EspaceMax;
    }

    function getAdresse() {
        return $this->Adresse;
    }

    function getVehiculeTransport() {
        return $this->vehiculeTransport;
    }

    function getVehiculecommerciale() {
        return $this->vehiculecommerciale;
    }

    function getVehiculepersennelle() {
        return $this->vehiculepersennelle;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setDescription($Description) {
        $this->Description = $Description;
    }

    function setEspaceMax($EspaceMax) {
        $this->EspaceMax = $EspaceMax;
    }

    function setAdresse($Adresse) {
        $this->Adresse = $Adresse;
    }

    function setVehiculeTransport($vehiculeTransport) {
        $this->vehiculeTransport = $vehiculeTransport;
    }

    function setVehiculecommerciale($vehiculecommerciale) {
        $this->vehiculecommerciale = $vehiculecommerciale;
    }

    function setVehiculepersennelle($vehiculepersennelle) {
        $this->vehiculepersennelle = $vehiculepersennelle;
    }
     public function __toString() {
        return $this->Adresse;
    }

    
}
