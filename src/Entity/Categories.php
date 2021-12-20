<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
#[ApiResource]
class Categories
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=ReportClient::class, mappedBy="service")
     */
    private $reportClients;

    public function __construct()
    {
        $this->reportClients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|ReportClient[]
     */
    public function getReportClients(): Collection
    {
        return $this->reportClients;
    }

    public function addReportClient(ReportClient $reportClient): self
    {
        if (!$this->reportClients->contains($reportClient)) {
            $this->reportClients[] = $reportClient;
            $reportClient->setService($this);
        }

        return $this;
    }

    public function removeReportClient(ReportClient $reportClient): self
    {
        if ($this->reportClients->removeElement($reportClient)) {
            // set the owning side to null (unless already changed)
            if ($reportClient->getService() === $this) {
                $reportClient->setService(null);
            }
        }

        return $this;
    }
}
