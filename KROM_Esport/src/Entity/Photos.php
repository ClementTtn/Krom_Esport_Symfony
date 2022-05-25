<?php

namespace App\Entity;

use App\Repository\PhotosRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PhotosRepository::class)]

// Liaison à API Platform.
#[ApiResource(
    collectionOperations: ['get' => ['normalization_context' => ['groups' => 'photos:list']]],
    itemOperations: ['get' => ['normalization_context' => ['groups' => 'photos:list']]],
)]

// Définition de la classe Photos.
class Photos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['photos:list'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['photos:list'])]
    private $src;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['photos:list'])]
    private $src_petite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(string $src): self
    {
        $this->src = $src;

        return $this;
    }

    public function getSrcPetite(): ?string
    {
        return $this->src_petite;
    }

    public function setSrcPetite(?string $src_petite): self
    {
        $this->src_petite = $src_petite;

        return $this;
    }
}
