<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DeliveryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeliveryRepository::class)]
#[ApiResource]
class Delivery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $drop_time = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $pick_up_time = null;

    #[ORM\OneToOne(inversedBy: 'delivery_id', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDropTime(): ?\DateTimeInterface
    {
        return $this->drop_time;
    }

    public function setDropTime(\DateTimeInterface $drop_time): static
    {
        $this->drop_time = $drop_time;

        return $this;
    }

    public function getPickUpTime(): ?\DateTimeInterface
    {
        return $this->pick_up_time;
    }

    public function setPickUpTime(\DateTimeInterface $pick_up_time): static
    {
        $this->pick_up_time = $pick_up_time;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }
}
