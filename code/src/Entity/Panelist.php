<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PanelistRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: PanelistRepository::class)]
class Panelist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column]
    private ?string $lastName = null;

    #[ORM\Column(unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private ?string $phone = null;

    #[ORM\Column]
    private ?string $country = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $receiveNewsletters = false;

    #[ORM\ManyToMany(targetEntity: Survey::class, inversedBy: 'panelists')]
    #[ORM\JoinTable(name: 'panelists_surveys')]
    private ?Collection $surveys = null;

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
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @return bool
     */
    public function getReceivesNewsletters(): bool
    {
        return $this->receiveNewsletters;
    }

    /**
     * @return Collection|null
     */
    public function getSurveys(): Collection|null
    {
        return $this->surveys;
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
