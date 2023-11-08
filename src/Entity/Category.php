<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ApiResource]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category_has_products', targetEntity: Product::class)]
    private Collection $products_has_category;

    public function __construct()
    {
        $this->products_has_category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Product>
     */
    public function getProductsHasCategory(): Collection
    {
        return $this->products_has_category;
    }

    public function addProductsHasCategory(Product $productsHasCategory): static
    {
        if (!$this->products_has_category->contains($productsHasCategory)) {
            $this->products_has_category->add($productsHasCategory);
            $productsHasCategory->setCategoryHasProducts($this);
        }

        return $this;
    }

    public function removeProductsHasCategory(Product $productsHasCategory): static
    {
        if ($this->products_has_category->removeElement($productsHasCategory)) {
            // set the owning side to null (unless already changed)
            if ($productsHasCategory->getCategoryHasProducts() === $this) {
                $productsHasCategory->setCategoryHasProducts(null);
            }
        }

        return $this;
    }
}
