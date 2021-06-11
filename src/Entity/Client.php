<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $societyName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mailContact;

    /**
     * @ORM\Column(type="integer")
     */
    private $phoneNumberContact;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activityType;

    /**
     * @ORM\OneToOne(targetEntity=InfoAdminClient::class, cascade={"persist", "remove"})
     */
    private $infoAdminClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSocietyName(): ?string
    {
        return $this->societyName;
    }

    public function setSocietyName(string $societyName): self
    {
        $this->societyName = $societyName;

        return $this;
    }

    public function getNameContact(): ?string
    {
        return $this->nameContact;
    }

    public function setNameContact(string $nameContact): self
    {
        $this->nameContact = $nameContact;

        return $this;
    }

    public function getMailContact(): ?string
    {
        return $this->mailContact;
    }

    public function setMailContact(string $mailContact): self
    {
        $this->mailContact = $mailContact;

        return $this;
    }

    public function getPhoneNumberContact(): ?int
    {
        return $this->phoneNumberContact;
    }

    public function setPhoneNumberContact(int $phoneNumberContact): self
    {
        $this->phoneNumberContact = $phoneNumberContact;

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

    public function getActivityType(): ?string
    {
        return $this->activityType;
    }

    public function setActivityType(string $activityType): self
    {
        $this->activityType = $activityType;

        return $this;
    }

    public function getInfoAdminClient(): ?InfoAdminClient
    {
        return $this->infoAdminClient;
    }

    public function setInfoAdminClient(?InfoAdminClient $infoAdminClient): self
    {
        $this->infoAdminClient = $infoAdminClient;

        return $this;
    }


    public function __toString(): ?string
    {
        return $this->getSocietyName();
    }
}
