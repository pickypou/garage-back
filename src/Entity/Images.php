<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Get;

#[ORM\Entity(repositoryClass: ImagesRepository::class)]
#[ApiResource(
    operations:[
        new Get(),
        new GetCollection()
    ]
   
)]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $imgUne = null;

    #[ORM\Column(length: 255)]
    private ?string $imgDeux = null;

    #[ORM\Column(length: 255)]
    private ?string $imgTrois = null;

    #[ORM\Column(length: 255)]
    private ?string $imgQuatre = null;

    #[ORM\Column(length: 255)]
    private ?string $imgCinq = null;

    #[ORM\Column(length: 255)]
    private ?string $imgSix = null;

    #[ORM\OneToOne(inversedBy: 'images', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Annonces $annonce = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImgUne(): ?string
    {
        return $this->imgUne;
    }

    public function setImgUne(string $imgUne): static
    {
        $this->imgUne = $imgUne;

        return $this;
    }

    public function getImgDeux(): ?string
    {
        return $this->imgDeux;
    }

    public function setImgDeux(string $imgDeux): static
    {
        $this->imgDeux = $imgDeux;

        return $this;
    }

    public function getImgTrois(): ?string
    {
        return $this->imgTrois;
    }

    public function setImgTrois(string $imgTrois): static
    {
        $this->imgTrois = $imgTrois;

        return $this;
    }

    public function getImgQuatre(): ?string
    {
        return $this->imgQuatre;
    }

    public function setImgQuatre(string $imgQuatre): static
    {
        $this->imgQuatre = $imgQuatre;

        return $this;
    }

    public function getImgCinq(): ?string
    {
        return $this->imgCinq;
    }

    public function setImgCinq(string $imgCinq): static
    {
        $this->imgCinq = $imgCinq;

        return $this;
    }

    public function getImgSix(): ?string
    {
        return $this->imgSix;
    }

    public function setImgSix(string $imgSix): static
    {
        $this->imgSix = $imgSix;

        return $this;
    }

    public function getAnnonce(): ?Annonces
    {
        return $this->annonce;
    }

    public function setAnnonce(Annonces $annonce): static
    {
        $this->annonce = $annonce;

        return $this;
    }
}
