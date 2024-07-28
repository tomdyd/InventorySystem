<?php

namespace App\Entity;

use App\Repository\ScannerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScannerRepository::class)]
class Scanner
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

    #[ORM\ManyToOne(inversedBy: 'scanners')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Localization $localization = null;

    #[ORM\ManyToOne(inversedBy: 'scanners')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DeviceType $Device_type = null;

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

    public function getLocalization(): ?Localization
    {
        return $this->localization;
    }

    public function setLocalization(?Localization $localization): static
    {
        $this->localization = $localization;

        return $this;
    }

    public function getDeviceType(): ?DeviceType
    {
        return $this->Device_type;
    }

    public function setDeviceType(?DeviceType $Device_type): static
    {
        $this->Device_type = $Device_type;

        return $this;
    }
}
