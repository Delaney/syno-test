<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PanelistRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PanelistRepository::class)]
#[ORM\Table(name: 'panelists')]
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
    #[Assert\Email(
        message: 'The email {{ value }} is not a valid email.'
    )]
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
     * @param string $firstName
     * @return void
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return void
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return void
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return void
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return bool
     */
    public function getReceiveNewsletters(): bool
    {
        return $this->receiveNewsletters;
    }

    /**
     * @param bool $receiveNewsletters
     * @return void
     */
    public function setReceiveNewsletters(bool $receiveNewsletters): void
    {
        $this->receiveNewsletters = $receiveNewsletters;
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
