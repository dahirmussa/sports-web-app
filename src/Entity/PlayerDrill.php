<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerDrillRepository")
 */
class PlayerDrill
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Drill", inversedBy="playerDrills")
     */
    private $drill;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Player", inversedBy="playerDrills")
     */
    private $player;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDrill(): ?Drill
    {
        return $this->drill;
    }

    public function setDrill(?Drill $drill): self
    {
        $this->drill = $drill;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): self
    {
        $this->player = $player;

        return $this;
    }
}
