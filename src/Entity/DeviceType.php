<?php

namespace App\Entity;

use App\Repository\DeviceTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeviceTypeRepository::class)]
class DeviceType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    /**
     * @var Collection<int, Computer>
     */
    #[ORM\OneToMany(targetEntity: Computer::class, mappedBy: 'device_type', orphanRemoval: true)]
    private Collection $computers;

    /**
     * @var Collection<int, Printer>
     */
    #[ORM\OneToMany(targetEntity: Printer::class, mappedBy: 'device_type', orphanRemoval: true)]
    private Collection $printers;

    /**
     * @var Collection<int, Monitor>
     */
    #[ORM\OneToMany(targetEntity: Monitor::class, mappedBy: 'device_type', orphanRemoval: true)]
    private Collection $monitors;

    /**
     * @var Collection<int, MouseAndKeyboard>
     */
    #[ORM\OneToMany(targetEntity: MouseAndKeyboard::class, mappedBy: 'Device_type', orphanRemoval: true)]
    private Collection $mouseAndKeyboards;

    /**
     * @var Collection<int, Scanner>
     */
    #[ORM\OneToMany(targetEntity: Scanner::class, mappedBy: 'Device_type', orphanRemoval: true)]
    private Collection $scanners;

    /**
     * @var Collection<int, Phone>
     */
    #[ORM\OneToMany(targetEntity: Phone::class, mappedBy: 'device_type', orphanRemoval: true)]
    private Collection $phones;

    /**
     * @var Collection<int, Tablet>
     */
    #[ORM\OneToMany(targetEntity: Tablet::class, mappedBy: 'device_type', orphanRemoval: true)]
    private Collection $tablets;

    public function __construct()
    {
        $this->computers = new ArrayCollection();
        $this->printers = new ArrayCollection();
        $this->monitors = new ArrayCollection();
        $this->mouseAndKeyboards = new ArrayCollection();
        $this->scanners = new ArrayCollection();
        $this->phones = new ArrayCollection();
        $this->tablets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Computer>
     */
    public function getComputers(): Collection
    {
        return $this->computers;
    }

    public function addComputer(Computer $computer): static
    {
        if (!$this->computers->contains($computer)) {
            $this->computers->add($computer);
            $computer->setDeviceType($this);
        }

        return $this;
    }

    public function removeComputer(Computer $computer): static
    {
        if ($this->computers->removeElement($computer)) {
            // set the owning side to null (unless already changed)
            if ($computer->getDeviceType() === $this) {
                $computer->setDeviceType(null);
            }
        }

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
            $printer->setDeviceType($this);
        }

        return $this;
    }

    public function removePrinter(Printer $printer): static
    {
        if ($this->printers->removeElement($printer)) {
            // set the owning side to null (unless already changed)
            if ($printer->getDeviceType() === $this) {
                $printer->setDeviceType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Monitor>
     */
    public function getMonitors(): Collection
    {
        return $this->monitors;
    }

    public function addMonitor(Monitor $monitor): static
    {
        if (!$this->monitors->contains($monitor)) {
            $this->monitors->add($monitor);
            $monitor->setDeviceType($this);
        }

        return $this;
    }

    public function removeMonitor(Monitor $monitor): static
    {
        if ($this->monitors->removeElement($monitor)) {
            // set the owning side to null (unless already changed)
            if ($monitor->getDeviceType() === $this) {
                $monitor->setDeviceType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MouseAndKeyboard>
     */
    public function getMouseAndKeyboards(): Collection
    {
        return $this->mouseAndKeyboards;
    }

    public function addMouseAndKeyboard(MouseAndKeyboard $mouseAndKeyboard): static
    {
        if (!$this->mouseAndKeyboards->contains($mouseAndKeyboard)) {
            $this->mouseAndKeyboards->add($mouseAndKeyboard);
            $mouseAndKeyboard->setDeviceType($this);
        }

        return $this;
    }

    public function removeMouseAndKeyboard(MouseAndKeyboard $mouseAndKeyboard): static
    {
        if ($this->mouseAndKeyboards->removeElement($mouseAndKeyboard)) {
            // set the owning side to null (unless already changed)
            if ($mouseAndKeyboard->getDeviceType() === $this) {
                $mouseAndKeyboard->setDeviceType(null);
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
            $scanner->setDeviceType($this);
        }

        return $this;
    }

    public function removeScanner(Scanner $scanner): static
    {
        if ($this->scanners->removeElement($scanner)) {
            // set the owning side to null (unless already changed)
            if ($scanner->getDeviceType() === $this) {
                $scanner->setDeviceType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Phone>
     */
    public function getPhones(): Collection
    {
        return $this->phones;
    }

    public function addPhone(Phone $phone): static
    {
        if (!$this->phones->contains($phone)) {
            $this->phones->add($phone);
            $phone->setDeviceType($this);
        }

        return $this;
    }

    public function removePhone(Phone $phone): static
    {
        if ($this->phones->removeElement($phone)) {
            // set the owning side to null (unless already changed)
            if ($phone->getDeviceType() === $this) {
                $phone->setDeviceType(null);
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
            $tablet->setDeviceType($this);
        }

        return $this;
    }

    public function removeTablet(Tablet $tablet): static
    {
        if ($this->tablets->removeElement($tablet)) {
            // set the owning side to null (unless already changed)
            if ($tablet->getDeviceType() === $this) {
                $tablet->setDeviceType(null);
            }
        }

        return $this;
    }
}
