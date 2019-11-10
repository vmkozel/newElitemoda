<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductSizeRepository")
 */
class ProductSize
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sizes", inversedBy="productSizes")
     */
    private $size;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Products", inversedBy="size")
     */
    private $products;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSize(): ?Sizes
    {
        return $this->size;
    }

    public function setSize(?Sizes $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getProducts(): ?Products
    {
        return $this->products;
    }

    public function setProducts(?Products $products): self
    {
        $this->products = $products;

        return $this;
    }
}
