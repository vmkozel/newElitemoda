<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductTagRepository")
 */
class ProductTag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tags", inversedBy="productTags")
     */
    private $tag;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Products", inversedBy="tags")
     */
    private $products;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTag(): ?Tags
    {
        return $this->tag;
    }

    public function setTag(?Tags $tag): self
    {
        $this->tag = $tag;

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

    public function getProd(): ?Products
    {
        return $this->prod;
    }

    public function setProd(?Products $prod): self
    {
        $this->prod = $prod;

        return $this;
    }
}
