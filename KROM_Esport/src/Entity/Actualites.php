<?php

namespace App\Entity;

use App\Repository\ActualitesRepository;
use Doctrine\ORM\Mapping as ORM;

// Définition de la classe Actualités.
#[ORM\Entity(repositoryClass: ActualitesRepository::class)]
class Actualites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'date')]
    private $dateParution;

    #[ORM\Column(type: 'text')]
    private $texte;

    #[ORM\Column(type: 'string', length: 255)]
    private $imgCouverture;

    #[ORM\Column(type: 'text', nullable: true)]
    private $video;

    #[ORM\Column(type: 'string', length: 255)]
    private $auteur;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sous_titre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $img_texte_1;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $img_texte_2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $img_texte_3;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $img_texte_4;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateParution(): ?\DateTimeInterface
    {
        return $this->dateParution;
    }

    public function setDateParution(\DateTimeInterface $dateParution): self
    {
        $this->dateParution = $dateParution;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getImgCouverture(): ?string
    {
        return $this->imgCouverture;
    }

    public function setImgCouverture(string $imgCouverture): self
    {
        $this->imgCouverture = $imgCouverture;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getSousTitre(): ?string
    {
        return $this->sous_titre;
    }

    public function setSousTitre(?string $sous_titre): self
    {
        $this->sous_titre = $sous_titre;

        return $this;
    }

    public function getImgTexte1(): ?string
    {
        return $this->img_texte_1;
    }

    public function setImgTexte1(?string $img_texte_1): self
    {
        $this->img_texte_1 = $img_texte_1;

        return $this;
    }

    public function getImgTexte2(): ?string
    {
        return $this->img_texte_2;
    }

    public function setImgTexte2(?string $img_texte_2): self
    {
        $this->img_texte_2 = $img_texte_2;

        return $this;
    }

    public function getImgTexte3(): ?string
    {
        return $this->img_texte_3;
    }

    public function setImgTexte3(?string $img_texte_3): self
    {
        $this->img_texte_3 = $img_texte_3;

        return $this;
    }

    public function getImgTexte4(): ?string
    {
        return $this->img_texte_4;
    }

    public function setImgTexte4(?string $img_texte_4): self
    {
        $this->img_texte_4 = $img_texte_4;

        return $this;
    }
}
