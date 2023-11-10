<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Table(name: '`product`')]
#[ApiResource(
    denormalizationContext: ['groups' => ['product:post']],
    normalizationContext: ['groups' => ['product:create', 'product:update', 'product:read']],
    operations: [
        new GetCollection(),
        new Post(validationContext: [
            'groups' => ['Default', 'user:create']
        ]),
        new Get(),
        new Put(),
        new Patch(),
        new Delete(),
    ]
)]
#[ApiFilter(SearchFilter::class, properties: ['category.id' => 'exact'])]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups('product:read')]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['product:read', 'product:post', 'product:create'])]
    private ?string $descritpion = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['produt:post', 'product:read', 'product:create'])]
    private ?string $state = null;

    #[ORM\Column(length: 255)]
    #[Groups(['product:read', 'product:post', 'product:create'])]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['product:post', 'product:read', 'product:create'])]
    private ?float $price = null;

    #[ORM\ManyToMany(targetEntity: Service::class, inversedBy: 'product_id')]
    private Collection $service_id;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    #[Groups(['product:post', 'product:read', 'product:create'])]
    private ?string $ironningCost = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    #[Groups(['product:post', 'product:read', 'product:create'])]
    private ?string $cleaningCost = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    #[Groups(['product:post', 'product:read', 'product:create'])]
    private ?string $dryCleaningCost = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    #[Groups(['product:post', 'product:read', 'product:create'])]
    private ?string $removingStainsCost = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    #[Groups(['product:post', 'product:read', 'product:create'])]
    private ?string $specialCleaningCost = null;

    #[ORM\ManyToOne(inversedBy: 'products_has_category')]
    private ?Category $category_has_products = null;

    #[ORM\Column(length: 500, nullable: true)]
    #[Groups(['product:post', 'product:read', 'product:create'])]
    private ?string $productPicture = null;

    public function __construct()
    {
        $this->service_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescritpion(): ?string
    {
        return $this->descritpion;
    }

    public function setDescritpion(string $descritpion): static
    {
        $this->descritpion = $descritpion;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getServiceId(): Collection
    {
        return $this->service_id;
    }

    public function addServiceId(Service $serviceId): static
    {
        if (!$this->service_id->contains($serviceId)) {
            $this->service_id->add($serviceId);
        }

        return $this;
    }

    public function removeServiceId(Service $serviceId): static
    {
        $this->service_id->removeElement($serviceId);

        return $this;
    }

    public function getIronningCost(): ?string
    {
        return $this->ironningCost;
    }

    public function setIronningCost(?string $ironningCost): static
    {
        $this->ironningCost = $ironningCost;

        return $this;
    }

    public function getCleaningCost(): ?string
    {
        return $this->cleaningCost;
    }

    public function setCleaningCost(?string $cleaningCost): static
    {
        $this->cleaningCost = $cleaningCost;

        return $this;
    }

    public function getDryCleaningCost(): ?string
    {
        return $this->dryCleaningCost;
    }

    public function setDryCleaningCost(?string $dryCleaningCost): static
    {
        $this->dryCleaningCost = $dryCleaningCost;

        return $this;
    }

    public function getRemovingStainsCost(): ?string
    {
        return $this->removingStainsCost;
    }

    public function setRemovingStainsCost(?string $removingStainsCost): static
    {
        $this->removingStainsCost = $removingStainsCost;

        return $this;
    }

    public function getSpecialCleaningCost(): ?string
    {
        return $this->specialCleaningCost;
    }

    public function setSpecialCleaningCost(?string $specialCleaningCost): static
    {
        $this->specialCleaningCost = $specialCleaningCost;

        return $this;
    }

    public function getCategoryHasProducts(): ?Category
    {
        return $this->category_has_products;
    }

    public function setCategoryHasProducts(?Category $category_has_products): static
    {
        $this->category_has_products = $category_has_products;

        return $this;
    }

    public function getProductPicture(): ?string
    {
        return $this->productPicture;
    }

    public function setProductPicture(?string $productPicture): static
    {
        $this->productPicture = $productPicture;

        return $this;
    }
}
