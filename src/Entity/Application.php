<?php

namespace App\Entity;

use App\Repository\ApplicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationRepository::class)
 */
class Application
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $appliedAt;

    /**
     * @ORM\ManyToOne(targetEntity=JobOffer::class)
     */
    private $offer;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="applications")
     */
    private $user;

    public function __construct()
    {
        $this->candidat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppliedAt(): ?\DateTimeInterface
    {
        return $this->appliedAt;
    }

    public function setAppliedAt(\DateTimeInterface $appliedAt): self
    {
        $this->appliedAt = $appliedAt;

        return $this;
    }

    public function getOffer(): ?JobOffer
    {
        return $this->offer;
    }

    public function setOffer(?JobOffer $offer): self
    {
        $this->offer = $offer;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
