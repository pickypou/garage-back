<?php

use App\Entity\Annonces; // Assurez-vous d'importer la classe Annonces si ce n'est pas déjà fait

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\OneToMany(targetEntity: Annonces::class, mappedBy: 'createdBy')]
    private $createdAnnonces;

    public function __construct()
    {
        $this->createdAnnonces = new ArrayCollection();
    }

    // Getters and setters for id, email, roles, password, firstname, and lastname...

    /**
     * @return Collection|Annonces[]
     */
    public function getCreatedAnnonces(): Collection
    {
        return $this->createdAnnonces;
    }

    public function addCreatedAnnonce(Annonces $annonce): self
    {
        if (!$this->createdAnnonces->contains($annonce)) {
            $this->createdAnnonces[] = $annonce;
            $annonce->setCreatedBy($this);
        }

        return $this;
    }

    public function removeCreatedAnnonce(Annonces $annonce): self
    {
        if ($this->createdAnnonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getCreatedBy() === $this) {
                $annonce->setCreatedBy(null);
            }
        }

        return $this;
    }
}
