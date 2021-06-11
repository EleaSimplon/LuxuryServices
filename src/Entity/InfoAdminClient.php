<?php

namespace App\Entity;

use App\Repository\InfoAdminClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InfoAdminClientRepository::class)
 */
class InfoAdminClient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // /**
    //  * @ORM\Column(type="string", length=255)
    //  */
    // private $name;

    // /**
    //  * @ORM\Column(type="string", length=255)
    //  */
    // private $postOccupied;

    // /**
    //  * @ORM\Column(type="integer")
    //  */
    // private $numContact;

    // /**
    //  * @ORM\Column(type="string", length=255)
    //  */
    // private $mailContact;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    // /**
    //  * @ORM\OneToOne(targetEntity=Client::class, mappedBy="infoAdminClient", cascade={"persist", "remove"})
    //  */
    // private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    // public function getName(): ?string
    // {
    //     return $this->name;
    // }

    // public function setName(string $name): self
    // {
    //     $this->name = $name;

    //     return $this;
    // }

    // public function getPostOccupied(): ?string
    // {
    //     return $this->postOccupied;
    // }

    // public function setPostOccupied(string $postOccupied): self
    // {
    //     $this->postOccupied = $postOccupied;

    //     return $this;
    // }

    // public function getNumContact(): ?int
    // {
    //     return $this->numContact;
    // }

    // public function setNumContact(int $numContact): self
    // {
    //     $this->numContact = $numContact;

    //     return $this;
    // }

    // public function getMailContact(): ?string
    // {
    //     return $this->mailContact;
    // }

    // public function setMailContact(string $mailContact): self
    // {
    //     $this->mailContact = $mailContact;

    //     return $this;
    // }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    // public function getClient(): ?Client
    // {
    //     return $this->client;
    // }

    // public function setClient(?Client $client): self
    // {
    //     // unset the owning side of the relation if necessary
    //     if ($client === null && $this->client !== null) {
    //         $this->client->setInfoAdminClient(null);
    //     }

    //     // set the owning side of the relation if necessary
    //     if ($client !== null && $client->getInfoAdminClient() !== $this) {
    //         $client->setInfoAdminClient($this);
    //     }

    //     $this->client = $client;

    //     return $this;
    // }
}
