<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DrillRepository")
 */
class Drill
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlayerDrill", mappedBy="drill")
     */
    private $playerDrills;

    public function __construct()
    {
        $this->playerDrills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|PlayerDrill[]
     */
    public function getPlayerDrills(): Collection
    {
        return $this->playerDrills;
    }

    public function addPlayerDrill(PlayerDrill $playerDrill): self
    {
        if (!$this->playerDrills->contains($playerDrill)) {
            $this->playerDrills[] = $playerDrill;
            $playerDrill->setDrill($this);
        }

        return $this;
    }

    public function removePlayerDrill(PlayerDrill $playerDrill): self
    {
        if ($this->playerDrills->contains($playerDrill)) {
            $this->playerDrills->removeElement($playerDrill);
            // set the owning side to null (unless already changed)
            if ($playerDrill->getDrill() === $this) {
                $playerDrill->setDrill(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
