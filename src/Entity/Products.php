<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductsRepository")
 */
class Products
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compositions", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $composition;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductTag", mappedBy="products")
     */
    private $tags;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Images", mappedBy="products")
     */
    private $images;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Collections", inversedBy="products")
     */
    private $collection;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductSize", mappedBy="products")
     */
    private $size;

    /**
     * @ORM\Column(type="smallint")
     */
    private $status;

    /**
     * @ORM\Column(type="smallint")
     */
    private $sale;

    /**
     * @ORM\Column(type="smallint")
     */
    private $new;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductTag", mappedBy="prod")
     */
    private $tag;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->size = new ArrayCollection();
        $this->tag = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticle(): ?int
    {
        return $this->article;
    }

    public function setArticle(int $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getComposition(): ?Compositions
    {
        return $this->composition;
    }

    public function setComposition(?Compositions $composition): self
    {
        $this->composition = $composition;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|ProductTag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(ProductTag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->setProducts($this);
        }

        return $this;
    }

    public function removeTag(ProductTag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            // set the owning side to null (unless already changed)
            if ($tag->getProducts() === $this) {
                $tag->setProducts(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setProducts($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getProducts() === $this) {
                $image->setProducts(null);
            }
        }

        return $this;
    }

    public function getCollection(): ?Collections
    {
        return $this->collection;
    }

    public function setCollection(?Collections $collection): self
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * @return Collection|ProductSize[]
     */
    public function getSize(): Collection
    {
        return $this->size;
    }

    public function addSize(ProductSize $size): self
    {
        if (!$this->size->contains($size)) {
            $this->size[] = $size;
            $size->setProducts($this);
        }

        return $this;
    }

    public function removeSize(ProductSize $size): self
    {
        if ($this->size->contains($size)) {
            $this->size->removeElement($size);
            // set the owning side to null (unless already changed)
            if ($size->getProducts() === $this) {
                $size->setProducts(null);
            }
        }

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSale(): ?int
    {
        return $this->sale;
    }

    public function setSale(int $sale): self
    {
        $this->sale = $sale;

        return $this;
    }

    public function getNew(): ?int
    {
        return $this->new;
    }

    public function setNew(int $new): self
    {
        $this->new = $new;

        return $this;
    }

    /**
     * @return Collection|ProductTag[]
     */
    public function getTag(): Collection
    {
        return $this->tag;
    }
}
