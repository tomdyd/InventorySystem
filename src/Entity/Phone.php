<?php

namespace App\Entity;

use App\Repository\PhoneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhoneRepository::class)]
class Phone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $IMEI_number = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column(length: 255)]
    private ?string $mac_address_wifi = null;

    #[ORM\Column(length: 4)]
    private ?string $PIN = null;

    #[ORM\Column(length: 8)]
    private ?string $PUK = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $user = null;

    #[ORM\ManyToOne(inversedBy: 'phones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DeviceType $device_type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIMEINumber(): ?string
    {
        return $this->IMEI_number;
    }

    public function setIMEINumber(string $IMEI_number): static
    {
        $this->IMEI_number = $IMEI_number;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getMacAddressWifi(): ?string
    {
        return $this->mac_address_wifi;
    }

    public function setMacAddressWifi(string $mac_address_wifi): static
    {
        $this->mac_address_wifi = $mac_address_wifi;

        return $this;
    }

    public function getPIN(): ?string
    {
        return $this->PIN;
    }

    public function setPIN(string $PIN): static
    {
        $this->PIN = $PIN;

        return $this;
    }

    public function getPUK(): ?string
    {
        return $this->PUK;
    }

    public function setPUK(string $PUK): static
    {
        $this->PUK = $PUK;

        return $this;
    }

    public function getuser(): ?user
    {
        return $this->user;
    }

    public function setuser(?user $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getDeviceType(): ?DeviceType
    {
        return $this->device_type;
    }

    public function setDeviceType(?DeviceType $device_type): static
    {
        $this->device_type = $device_type;

        return $this;
    }
}
