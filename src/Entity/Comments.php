<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use App\Repository\CommentsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: CommentsRepository::class)]
#[ApiResource(
    operations:[
        new Get(),
        new GetCollection(),
        new Post(denormalizationContext: ['groups'=> ['comment:write']])
    ]
)]
class Comments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Gedmo\Timestampable(on: 'create')]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 255)]
    #[Groups(['comment:write'])]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['comment:write'])]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'comment', targetEntity: CommentRating::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $ratings;

    public function __construct()
    {
        $this->ratings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getRatings(): Collection
    {
        return $this->ratings;
    }

    public function addRating(CommentRating $rating): static
    {
        if (!$this->ratings->contains($rating)) {
            $this->ratings->add($rating);
            $rating->setComment($this);
        }

        return $this;
    }

    public function removeRating(CommentRating $rating): static
    {
        if ($this->ratings->removeElement($rating)) {
            // Set the owning side to null (unless already changed)
            if ($rating->getComment() === $this) {
                $rating->setComment(null);
            }
        }

        return $this;
    }

    public function getAverageRating(): float
    {
        $totalRating = 0;
        $count = $this->ratings->count();

        foreach ($this->ratings as $rating) {
            $totalRating += $rating->getRating();
        }

        return $count ? $totalRating / $count : 0;
    }
}
