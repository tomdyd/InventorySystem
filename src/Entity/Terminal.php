<?php

namespace App\Entity;

use App\Repository\TerminalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TerminalRepository::class)]
class Terminal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $serial_number = null;

    #[ORM\Column(length: 255)]
    private ?string $Brand = null;

    #[ORM\Column(length: 255)]
    private ?string $MOdel = null;

    #[ORM\ManyToOne(inversedBy: 'terminals')]
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
        return $this->Brand;
    }

    public function setBrand(string $Brand): static
    {
        $this->Brand = $Brand;

        return $this;
    }

    public function getMOdel(): ?string
    {
        return $this->MOdel;
    }

    public function setMOdel(string $MOdel): static
    {
        $this->MOdel = $MOdel;

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
