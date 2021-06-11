<?php

namespace App\Entity;

use App\Repository\JobOfferRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobOfferRepository::class)
 */
class JobOffer
{
     /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\Column(name="id", type="string")
     * @ORM\CustomIdGenerator(class="Doctrine\Bundle\DoctrineBundle\IdGenerator")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titleJob;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVisible;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string")
     */
    private $expiredAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $salary;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=JobCategory::class, inversedBy="jobOffers")
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=JobType::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitleJob(): ?string
    {
        return $this->titleJob;
    }

    public function setTitleJob(string $titleJob): self
    {
        $this->titleJob = $titleJob;

        return $this;
    }

    public function getIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getExpiredAt(): ?string
    {
        return $this->expiredAt;
    }

    public function setExpiredAt(string $expiredAt): self
    {
        $this->expiredAt = $expiredAt;

        return $this;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCategory(): ?JobCategory
    {
        return $this->category;
    }

    public function setCategory(?JobCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getType(): ?JobType
    {
        return $this->type;
    }

    public function setType(?JobType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getId();
    }

}
