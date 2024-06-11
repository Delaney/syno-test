<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SurveyRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: SurveyRepository::class)]
#[ORM\Table(name: 'surveys')]
#[Gedmo\SoftDeleteable(fieldName: 'deletedAt', timeAware: false)]
class Survey
{
    use TimestampableEntity, SoftDeleteableEntity;

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
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }
}
