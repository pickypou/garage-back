<?php

namespace App\Entity;

use App\Repository\OptionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OptionsRepository::class)]
class Options
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $gps = null;

    #[ORM\Column(length: 255)]
    private ?string $regulateur = null;

    #[ORM\Column(length: 255)]
    private ?string $limitateur = null;

    #[ORM\Column(length: 255)]
    private ?string $clim = null;

    #[ORM\Column(length: 255)]
    private ?string $sfu = null;

    #[ORM\Column(length: 255)]
    private ?string $sac = null;

    #[ORM\Column(length: 255)]
    private ?string $bluetooth = null;

    #[ORM\Column(length: 255)]
    private ?string $camera = null;

    #[ORM\Column(length: 255)]
    private ?string $sas = null;

    #[ORM\OneToOne(inversedBy: 'options', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Annonces $annonce = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGps(): ?string
    {
        return $this->gps;
    }

    public function setGps(string $gps): static
    {
        $this->gps = $gps;

        return $this;
    }

    public function getRegulateur(): ?string
    {
        return $this->regulateur;
    }

    public function setRegulateur(string $regulateur): static
    {
        $this->regulateur = $regulateur;

        return $this;
    }

    public function getLimitateur(): ?string
    {
        return $this->limitateur;
    }

    public function setLimitateur(string $limitateur): static
    {
        $this->limitateur = $limitateur;

        return $this;
    }

    public function getClim(): ?string
    {
        return $this->clim;
    }

    public function setClim(string $clim): static
    {
        $this->clim = $clim;

        return $this;
    }

    public function getSfu(): ?string
    {
        return $this->sfu;
    }

    public function setSfu(string $sfu): static
    {
        $this->sfu = $sfu;

        return $this;
    }

    public function getSac(): ?string
    {
        return $this->sac;
    }

    public function setSac(string $sac): static
    {
        $this->sac = $sac;

        return $this;
    }

    public function getBluetooth(): ?string
    {
        return $this->bluetooth;
    }

    public function setBluetooth(string $bluetooth): static
    {
        $this->bluetooth = $bluetooth;

        return $this;
    }

    public function getCamera(): ?string
    {
        return $this->camera;
    }

    public function setCamera(string $camera): static
    {
        $this->camera = $camera;

        return $this;
    }

    public function getSas(): ?string
    {
        return $this->sas;
    }

    public function setSas(string $sas): static
    {
        $this->sas = $sas;

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
