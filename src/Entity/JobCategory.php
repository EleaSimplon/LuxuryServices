<?php

namespace App\Entity;

use App\Repository\JobCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobCategoryRepository::class)
 */
class JobCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=JobOffer::class, mappedBy="category")
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=JobOffer::class, mappedBy="category")
     */
    private $jobOffers;

    public function __construct()
    {
        $this->type = new ArrayCollection();
        $this->jobOffers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|JobOffer[]
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(JobOffer $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
            $type->setCategory($this);
        }

        return $this;
    }

    public function removeType(JobOffer $type): self
    {
        if ($this->type->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getCategory() === $this) {
                $type->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JobOffer[]
     */
    public function getJobOffers(): Collection
    {
        return $this->jobOffers;
    }

    public function addJobOffer(JobOffer $jobOffer): self
    {
        if (!$this->jobOffers->contains($jobOffer)) {
            $this->jobOffers[] = $jobOffer;
            $jobOffer->setCategory($this);
        }

        return $this;
    }

    public function removeJobOffer(JobOffer $jobOffer): self
    {
        if ($this->jobOffers->removeElement($jobOffer)) {
            // set the owning side to null (unless already changed)
            if ($jobOffer->getCategory() === $this) {
                $jobOffer->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString(): ?string
    {
        return $this->getCategory();
    }
}
