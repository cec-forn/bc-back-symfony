<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
#[ApiResource]
class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $discount_code = null;

    #[ORM\Column(length: 255)]
    private ?string $payment_method = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiscountCode(): ?string
    {
        return $this->discount_code;
    }

    public function setDiscountCode(?string $discount_code): static
    {
        $this->discount_code = $discount_code;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->payment_method;
    }

    public function setPaymentMethod(string $payment_method): static
    {
        $this->payment_method = $payment_method;

        return $this;
    }
}
