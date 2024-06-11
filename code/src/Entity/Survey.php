<?php

namespace App\Entity;

use App\Repository\SurveyRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SurveyRepository::class)]
#[ORM\Table(name: 'surveys')]
class Survey
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $name = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $active = false;

    #[ORM\ManyToMany(targetEntity: Panelist::class, mappedBy: 'surveys')]
    private ?Collection $panelists = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: false)]
    protected DateTimeImmutable $createdAt;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: false)]
    protected DateTimeImmutable $updatedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->active;
    }

    /**
     * @return Collection|null
     */
    public function getPanelists(): Collection|null
    {
        return $this->panelists;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }
}
