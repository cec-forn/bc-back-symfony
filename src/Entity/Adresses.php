<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AdressesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdressesRepository::class)]
#[ApiResource]
class Adresses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column]
    private ?int $zipcode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'adresses')]
    private Collection $users_has_adresses;

    public function __construct()
    {
        $this->users_has_adresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode): static
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection<int, user>
     */
    public function getUsersHasAdresses(): Collection
    {
        return $this->users_has_adresses;
    }

    public function addUsersHasAdress(User $usersHasAdress): static
    {
        if (!$this->users_has_adresses->contains($usersHasAdress)) {
            $this->users_has_adresses->add($usersHasAdress);
        }

        return $this;
    }

    public function removeUsersHasAdress(User $usersHasAdress): static
    {
        $this->users_has_adresses->removeElement($usersHasAdress);

        return $this;
    }
}
