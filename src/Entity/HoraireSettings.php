<?php

namespace App\Entity;

use App\Repository\HoraireSettingsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: HoraireSettingsRepository::class)]
class HoraireSettings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    #[Assert\NotNull()]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $entree = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $ExitBreak = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $ReturnBreak = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $ExitWork = null;

    public function getId(): ?int
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEntree(): ?\DateTimeInterface
    {
        return $this->entree;
    }

    public function setEntree(\DateTimeInterface $entree): self
    {
        $this->entree = $entree;

        return $this;
    }

    public function getExitBreak(): ?\DateTimeInterface
    {
        return $this->ExitBreak;
    }

    public function setExitBreak(\DateTimeInterface $ExitBreak): self
    {
        $this->ExitBreak = $ExitBreak;

        return $this;
    }

    public function getReturnBreak(): ?\DateTimeInterface
    {
        return $this->ReturnBreak;
    }

    public function setReturnBreak(\DateTimeInterface $ReturnBreak): self
    {
        $this->ReturnBreak = $ReturnBreak;

        return $this;
    }

    public function getExitWork(): ?\DateTimeInterface
    {
        return $this->ExitWork;
    }

    public function setExitWork(\DateTimeInterface $ExitWork): self
    {
        $this->ExitWork = $ExitWork;

        return $this;
    }
}
