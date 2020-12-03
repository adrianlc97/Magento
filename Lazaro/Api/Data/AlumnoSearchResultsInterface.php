<?php

namespace Hiberus\Lazaro\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface AlumnoSearchResultsInterface
 * @package Hiberus\Lazaro\Api\Data
 */
interface AlumnoSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get alumno list.
     *
     * @return Hiberus\Lazaro\Api\Data\AlumnoInterface[]
     */
    public function getItems();

    /**
     * Set alumno list.
     *
     * @param Hiberus\Lazaro\Api\Data\AlumnoInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
