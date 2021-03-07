<?php
namespace businessService\models;

class Address
{
    private $id;
    private $AddressType;
    private $IsDefault;
    private $Users_Id;
    private $Street;
    private $City;
    private $State;
    private $Zip;
    
    public function __construct(?string $street, ?string $city, ?string $state, ?string $zip){
        $this->Street = $street;
        $this->City = $city;
        $this->State = $state;
        $this->Zip = $zip;
        $this->AddressType = 1;
        $this->IsDefault = 1;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getAddressType()
    {
        return $this->AddressType;
    }


    public function getIsDefault()
    {
        return $this->IsDefault;
    }

    public function getUsers_Id()
    {
        return $this->Users_Id;
    }

    public function getStreet()
    {
        return $this->Street;
    }

    public function getCity()
    {
        return $this->City;
    }

    public function getState()
    {
        return $this->State;
    }

    public function getZip()
    {
        return $this->Zip;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setAddressType($AddressType)
    {
        $this->AddressType = $AddressType;
    }

    public function setIsDefault($IsDefault)
    {
        $this->IsDefault = $IsDefault;
    }

    public function setUsers_Id($Users_Id)
    {
        $this->Users_Id = $Users_Id;
    }

    public function setStreet($Street)
    {
        $this->Street = $Street;
    }

    public function setCity($City)
    {
        $this->City = $City;
    }

    public function setState($State)
    {
        $this->State = $State;
    }

    public function setZip($Zip)
    {
        $this->Zip = $Zip;
    }
}

?>
