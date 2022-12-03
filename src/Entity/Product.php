<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Index(columns: ['sku'], name: 'IDX_product_sku')]
#[ORM\Index(columns: ['price'], name: 'IDX_product_price')]
class Product
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', columnDefinition: 'CHAR(36) NOT NULL')]
    private string $id;

    #[ORM\Column(type: 'string' ,length: 100)]
    private ?string $name = null;

    #[ORM\Column(type: 'string' ,length: 50)]
    private ?string $sku = null;

    #[ORM\Column(type: 'float', precision: 8, scale: 2)]
    private ?float $price = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $createOn;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

	public function __construct()
	{
		$this->id = Uuid::v4()->toRfc4122();
		$this->createOn = new \DateTime();
	}

	public function getId(): string
	{
		 return $this->id;
	}

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreateOn(): \DateTimeInterface
    {
        return $this->createOn;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
