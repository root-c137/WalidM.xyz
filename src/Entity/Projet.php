<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Category;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Github;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ApiLink;



    public function __construct()
    {
        $this->blas = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->Category;
    }

    public function setCategory(string $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    public function getGithub(): ?string
    {
        return $this->Github;
    }

    public function setGithub(?string $Github): self
    {
        $this->Github = $Github;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->Link;
    }

    public function setLink(string $Link): self
    {
        $this->Link = $Link;

        return $this;
    }

    public function getApiLink(): ?string
    {
        return $this->ApiLink;
    }

    public function setApiLink(string $ApiLink): self
    {
        $this->ApiLink = $ApiLink;

        return $this;
    }

}
