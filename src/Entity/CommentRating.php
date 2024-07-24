<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
class CommentRating
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Comments::class, inversedBy: 'ratings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Comments $comment = null;

    #[ORM\Column(type: 'integer')]
    #[Groups(['comment:write'])]
    private ?int $rating = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?Comments
    {
        return $this->comment;
    }

    public function setComment(?Comments $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): static
    {
        $this->rating = $rating;

        return $this;
    }
}
