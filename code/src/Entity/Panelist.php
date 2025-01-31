<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PanelistRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PanelistRepository::class)]
#[ORM\Table(name: 'panelists')]
#[Gedmo\SoftDeleteable(fieldName: 'deletedAt', timeAware: false)]
class Panelist
{
    use TimestampableEntity, SoftDeleteableEntity;

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
    #[Assert\Regex('/^\+?[0-9]{10,13}$/')]
    #[Assert\Type(
        type: 'numeric',
        message: 'The value {{ value }} is not a valid phone number.',
    )]
    private ?string $phone = null;

    #[ORM\Column]
    private ?string $country = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $receiveNewsletters = false;

    /**
     * @var Collection<int, Survey>|null
     */
    #[ORM\ManyToMany(targetEntity: Survey::class, inversedBy: 'panelists')]
    #[ORM\JoinTable(name: 'panelists_surveys')]
    private ?Collection $surveys = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
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

    public function getFullName(): ?string
    {
        return "$this->firstName $this->lastName";
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
    public function getReceiveNewsletters(): bool
    {
        return $this->receiveNewsletters;
    }

    /**
     * @return ?Collection<int, Survey>
     */
    public function getSurveys(): ?Collection
    {
        return $this->surveys;
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
     * @param string $lastName
     * @return void
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
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
     * @param string $phone
     * @return void
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
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
     * @param bool $receiveNewsletters
     * @return void
     */
    public function setReceiveNewsletters(bool $receiveNewsletters): void
    {
        $this->receiveNewsletters = $receiveNewsletters;
    }
}
