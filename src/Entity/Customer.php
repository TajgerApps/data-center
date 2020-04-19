<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 */
class Customer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $nip = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $regon = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $company_name = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $street = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $building = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $floor = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $city = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $is_company = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $firstname = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $lastname = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $short_company_name = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $email = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $is_contact_adrees = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $contact_street = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $contact_building = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $contact_flat_number = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $country = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $contact_country = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $contact_city = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $phone = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $second_phone = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $zip_code = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $contact_zip_code = null;

    /**
     * @ORM\Column(type="integer")
     */
    private int $created_by;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $created_at;

    /**
     * @ORM\Column(type="integer")
     */
    private int $modified_by;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $modified_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNip(): ?int
    {
        return $this->nip;
    }

    public function setNip(?int $nip): self
    {
        $this->nip = $nip;

        return $this;
    }

    public function getRegon(): ?int
    {
        return $this->regon;
    }

    public function setRegon(?int $regon): self
    {
        $this->regon = $regon;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    public function setCompanyName(?string $company_name): self
    {
        $this->company_name = $company_name;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getBuilding(): ?string
    {
        return $this->building;
    }

    public function setBuilding(?string $building): self
    {
        $this->building = $building;

        return $this;
    }

    public function getFloor(): ?string
    {
        return $this->floor;
    }

    public function setFloor(?string $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getIsCompany(): ?bool
    {
        return $this->is_company;
    }

    public function setIsCompany(bool $is_company): self
    {
        $this->is_company = $is_company;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getShortCompanyName(): ?string
    {
        return $this->short_company_name;
    }

    public function setShortCompanyName(?string $short_company_name): self
    {
        $this->short_company_name = $short_company_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIsContactAdrees(): ?bool
    {
        return $this->is_contact_adrees;
    }

    public function setIsContactAdrees(?bool $is_contact_adrees): self
    {
        $this->is_contact_adrees = $is_contact_adrees;

        return $this;
    }

    public function getContactStreet(): ?string
    {
        return $this->contact_street;
    }

    public function setContactStreet(?string $contact_street): self
    {
        $this->contact_street = $contact_street;

        return $this;
    }

    public function getContactBuilding(): ?string
    {
        return $this->contact_building;
    }

    public function setContactBuilding(?string $contact_building): self
    {
        $this->contact_building = $contact_building;

        return $this;
    }

    public function getContactFlatNumber(): ?string
    {
        return $this->contact_flat_number;
    }

    public function setContactFlatNumber(?string $contact_flat_number): self
    {
        $this->contact_flat_number = $contact_flat_number;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getContactCountry(): ?string
    {
        return $this->contact_country;
    }

    public function setContactCountry(?string $contact_country): self
    {
        $this->contact_country = $contact_country;

        return $this;
    }

    public function getContactCity(): ?string
    {
        return $this->contact_city;
    }

    public function setContactCity(?string $contact_city): self
    {
        $this->contact_city = $contact_city;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getSecondPhone(): ?string
    {
        return $this->second_phone;
    }

    public function setSecondPhone(string $second_phone): self
    {
        $this->second_phone = $second_phone;

        return $this;
    }

    public function getFullName()
    {
        return $this->getFirstname().' '.$this->getLastname();
    }

    public function getZipCode(): ?string
    {
        return $this->zip_code;
    }

    public function setZipCode(?string $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getContactZipCode(): ?string
    {
        return $this->contact_zip_code;
    }

    public function setContactZipCode(?string $contact_zip_code): self
    {
        $this->contact_zip_code = $contact_zip_code;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getModifiedBy(): ?int
    {
        return $this->modified_by;
    }

    public function setModifiedBy(int $modified_by): self
    {
        $this->modified_by = $modified_by;

        return $this;
    }

    public function getModifiedAt(): ?\DateTimeInterface
    {
        return $this->modified_at;
    }

    public function setModifiedAt(\DateTimeInterface $modified_at): self
    {
        $this->modified_at = $modified_at;

        return $this;
    }

    public function getCreatedBy(): int
    {
        return $this->created_by;
    }

    public function setCreatedBy(int $created_by): void
    {
        $this->created_by = $created_by;
    }
}
