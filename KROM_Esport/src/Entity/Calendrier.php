<?php

namespace App\Entity;

use App\Repository\CalendrierRepository;
use Doctrine\ORM\Mapping as ORM;

// Définition de la classe Calendrier.
#[ORM\Entity(repositoryClass: CalendrierRepository::class)]
class Calendrier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'string', length: 7)]
    private $heure;

    #[ORM\Column(type: 'string', length: 255)]
    private $intitule;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lien_evenement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(string $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getLienEvenement(): ?string
    {
        return $this->lien_evenement;
    }

    public function setLienEvenement(?string $lien_evenement): self
    {
        $this->lien_evenement = $lien_evenement;

        return $this;
    }
}
