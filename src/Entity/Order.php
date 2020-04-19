<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contract_number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $offer_number;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $investor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $object_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $building_category;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $safety;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getContractNumber(): ?string
    {
        return $this->contract_number;
    }

    public function setContractNumber(?string $contract_number): self
    {
        $this->contract_number = $contract_number;

        return $this;
    }

    public function getOfferNumber(): ?string
    {
        return $this->offer_number;
    }

    public function setOfferNumber(?string $offer_number): self
    {
        $this->offer_number = $offer_number;

        return $this;
    }

    public function getInvestor(): ?int
    {
        return $this->investor;
    }

    public function setInvestor(?int $investor): self
    {
        $this->investor = $investor;

        return $this;
    }

    public function getObjectType(): ?string
    {
        return $this->object_type;
    }

    public function setObjectType(?string $object_type): self
    {
        $this->object_type = $object_type;

        return $this;
    }

    public function getBuildingCategory(): ?string
    {
        return $this->building_category;
    }

    public function setBuildingCategory(?string $building_category): self
    {
        $this->building_category = $building_category;

        return $this;
    }

    public function getSafety(): ?string
    {
        return $this->safety;
    }

    public function setSafety(?string $safety): self
    {
        $this->safety = $safety;

        return $this;
    }
}
