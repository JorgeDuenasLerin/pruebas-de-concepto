<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriaRepository")
 */
class Categoria
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comida", mappedBy="categoria")
     */
    private $comidas;

    public function __construct()
    {
        $this->comidas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Comida[]
     */
    public function getComidas(): Collection
    {
        return $this->comidas;
    }

    public function addComida(Comida $comida): self
    {
        if (!$this->comidas->contains($comida)) {
            $this->comidas[] = $comida;
            $comida->setCategoria($this);
        }

        return $this;
    }

    public function removeComida(Comida $comida): self
    {
        if ($this->comidas->contains($comida)) {
            $this->comidas->removeElement($comida);
            // set the owning side to null (unless already changed)
            if ($comida->getCategoria() === $this) {
                $comida->setCategoria(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->nombre;
    }
}
