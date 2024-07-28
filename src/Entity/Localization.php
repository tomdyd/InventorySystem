<?php

namespace App\Entity;

use App\Repository\LocalizationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocalizationRepository::class)]
class Localization
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<int, Printer>
     */
    #[ORM\OneToMany(targetEntity: Printer::class, mappedBy: 'Localization', orphanRemoval: true)]
    private Collection $printers;

    /**
     * @var Collection<int, Scanner>
     */
    #[ORM\OneToMany(targetEntity: Scanner::class, mappedBy: 'localization', orphanRemoval: true)]
    private Collection $scanners;

    /**
     * @var Collection<int, Tablet>
     */
    #[ORM\OneToMany(targetEntity: Tablet::class, mappedBy: 'Localization', orphanRemoval: true)]
    private Collection $tablets;

    /**
     * @var Collection<int, Terminal>
     */
    #[ORM\OneToMany(targetEntity: Terminal::class, mappedBy: 'Localization', orphanRemoval: true)]
    private Collection $terminals;

    public function __construct()
    {
        $this->printers = new ArrayCollection();
        $this->scanners = new ArrayCollection();
        $this->tablets = new ArrayCollection();
        $this->terminals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Printer>
     */
    public function getPrinters(): Collection
    {
        return $this->printers;
    }

    public function addPrinter(Printer $printer): static
    {
        if (!$this->printers->contains($printer)) {
            $this->printers->add($printer);
            $printer->setLocalization($this);
        }

        return $this;
    }

    public function removePrinter(Printer $printer): static
    {
        if ($this->printers->removeElement($printer)) {
            // set the owning side to null (unless already changed)
            if ($printer->getLocalization() === $this) {
                $printer->setLocalization(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Scanner>
     */
    public function getScanners(): Collection
    {
        return $this->scanners;
    }

    public function addScanner(Scanner $scanner): static
    {
        if (!$this->scanners->contains($scanner)) {
            $this->scanners->add($scanner);
            $scanner->setLocalization($this);
        }

        return $this;
    }

    public function removeScanner(Scanner $scanner): static
    {
        if ($this->scanners->removeElement($scanner)) {
            // set the owning side to null (unless already changed)
            if ($scanner->getLocalization() === $this) {
                $scanner->setLocalization(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tablet>
     */
    public function getTablets(): Collection
    {
        return $this->tablets;
    }

    public function addTablet(Tablet $tablet): static
    {
        if (!$this->tablets->contains($tablet)) {
            $this->tablets->add($tablet);
            $tablet->setLocalization($this);
        }

        return $this;
    }

    public function removeTablet(Tablet $tablet): static
    {
        if ($this->tablets->removeElement($tablet)) {
            // set the owning side to null (unless already changed)
            if ($tablet->getLocalization() === $this) {
                $tablet->setLocalization(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Terminal>
     */
    public function getTerminals(): Collection
    {
        return $this->terminals;
    }

    public function addTerminal(Terminal $terminal): static
    {
        if (!$this->terminals->contains($terminal)) {
            $this->terminals->add($terminal);
            $terminal->setLocalization($this);
        }

        return $this;
    }

    public function removeTerminal(Terminal $terminal): static
    {
        if ($this->terminals->removeElement($terminal)) {
            // set the owning side to null (unless already changed)
            if ($terminal->getLocalization() === $this) {
                $terminal->setLocalization(null);
            }
        }

        return $this;
    }
}
