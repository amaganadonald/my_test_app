<?php

namespace App\Entity;

use App\Repository\EmployeesRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EmployeesRepository::class)]
class Employees
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    #[Assert\Length(min:2, max:80)]
    private ?string $firstname = null;

    #[ORM\Column(length: 80)]
    #[Assert\NotBlank()]
    private ?string $lastname = null;

    #[ORM\Column(length: 50)]
    private ?string $register_number = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $lastUpadatedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $observation = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotNull()]
    private ?string $code = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\Column]
    private ?bool $Quart = null;

    #[ORM\Column(nullable: true)]
    private ?int $HourPackage = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getRegisterNumber(): ?string
    {
        return $this->register_number;
    }

    public function setRegisterNumber(string $register_number): self
    {
        $this->register_number = $register_number;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLastUpadatedAt(): ?\DateTimeImmutable
    {
        return $this->lastUpadatedAt;
    }

    public function setLastUpadatedAt(\DateTimeImmutable $lastUpadatedAt): self
    {
        $this->lastUpadatedAt = $lastUpadatedAt;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function isQuart(): ?bool
    {
        return $this->Quart;
    }

    public function setQuart(bool $Quart): self
    {
        $this->Quart = $Quart;

        return $this;
    }

    public function getHourPackage(): ?int
    {
        return $this->HourPackage;
    }

    public function setHourPackage(?int $HourPackage): self
    {
        $this->HourPackage = $HourPackage;

        return $this;
    }
}
