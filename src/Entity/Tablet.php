<?php

namespace App\Entity;

use App\Repository\TabletRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TabletRepository::class)]
class Tablet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $serial_number = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column(length: 255)]
    private ?string $mac_address_lan = null;

    #[ORM\Column(length: 255)]
    private ?string $ip_address = null;

    #[ORM\ManyToOne(inversedBy: 'tablets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DeviceType $device_type = null;

    #[ORM\ManyToOne(inversedBy: 'tablets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Localization $Localization = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerialNumber(): ?string
    {
        return $this->serial_number;
    }

    public function setSerialNumber(string $serial_number): static
    {
        $this->serial_number = $serial_number;

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

    public function getMacAddressLan(): ?string
    {
        return $this->mac_address_lan;
    }

    public function setMacAddressLan(string $mac_address_lan): static
    {
        $this->mac_address_lan = $mac_address_lan;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ip_address;
    }

    public function setIpAddress(string $ip_address): static
    {
        $this->ip_address = $ip_address;

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

    public function getLocalization(): ?Localization
    {
        return $this->Localization;
    }

    public function setLocalization(?Localization $Localization): static
    {
        $this->Localization = $Localization;

        return $this;
    }
}
