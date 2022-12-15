<?php 

namespace App\Data;

use App\Entity\CarCategory;

class SearchData 
{
    /**
     * Undocumented variable
     *
     * @var string
     */
    public $search='';

    /**
     * Undocumented variable
     *
     * @var CarCategory[]
     */
    public $categories = [];

    /**
     * Undocumented variable
     *
     * @var null|int
     */
    public $nbSeats;

    /**
     * Undocumented variable
     *
     * @var null|int
     */
    public $nbDoors;
    /**
     * Undocumented variable
     *
     * @var null|int
     */
    public $max;

    /**
     * Undocumented variable
     *
     * @var int|null
     */
    public $min;

     /**
     * Get undocumented variable
     */
    public function getNbSeats(): ?int
    {
        return $this->nbSeats;
    }
    /**
     * Get undocumented variable
     */
    public function getNbDoors(): ?int
    {
        return $this->nbDoors;
    }

    /**
     * Get undocumented variable
     */
    public function getMin(): ?int
    {
        return $this->min;
    }

    /**
     * Set undocumented variable
     */
    public function setMin(?int $min): self
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Get undocumented variable
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * Set undocumented variable
     */
    public function setCategories(array $categories): self
    {
        $this->categories = $categories;

        return $this;
    }
}