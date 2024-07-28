<?php

namespace App\Entity;

use App\Repository\ComputerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComputerRepository::class)]
class Computer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $serial_number = null;

    #[ORM\ManyToOne(inversedBy: 'computers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DeviceType $device_type = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $domain_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mac_address_lan = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mac_address_wifi = null;

    #[ORM\Column(length: 255)]
    private ?string $ip = null;

    #[ORM\Column(length: 255)]
    private ?string $localization = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_from = null;

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

    public function getDeviceType(): ?DeviceType
    {
        return $this->device_type;
    }

    public function setDeviceType(?DeviceType $device_type): static
    {
        $this->device_type = $device_type;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

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

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getDomainName(): ?string
    {
        return $this->domain_name;
    }

    public function setDomainName(string $domain_name): static
    {
        $this->domain_name = $domain_name;

        return $this;
    }

    public function getMacAddressLan(): ?string
    {
        return $this->mac_address_lan;
    }

    public function setMacAddressLan(?string $mac_address_lan): static
    {
        $this->mac_address_lan = $mac_address_lan;

        return $this;
    }

    public function getMacAddressWifi(): ?string
    {
        return $this->mac_address_wifi;
    }

    public function setMacAddressWifi(?string $mac_address_wifi): static
    {
        $this->mac_address_wifi = $mac_address_wifi;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): static
    {
        $this->ip = $ip;

        return $this;
    }

    public function getLocalization(): ?string
    {
        return $this->localization;
    }

    public function setLocalization(string $localization): static
    {
        $this->localization = $localization;

        return $this;
    }

    public function getDateFrom(): ?\DateTimeInterface
    {
        return $this->date_from;
    }

    public function setDateFrom(\DateTimeInterface $date_from): static
    {
        $this->date_from = $date_from;

        return $this;
    }
}
