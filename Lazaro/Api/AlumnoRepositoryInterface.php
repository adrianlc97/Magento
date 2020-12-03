<?php


namespace Hiberus\Lazaro\Api;

use Hiberus\Lazaro\Api\Data\AlumnoInterface;
use Hiberus\Lazaro\Api\Data\AlumnoSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Interface AlumnoRepositoryInterface
 * @package Hiberus\Lazaro\Api
 */
interface AlumnoRepositoryInterface
{
    /**
     * Save a Alumno
     *
     * @param \Hiberus\Lazaro\Api\Data\AlumnoInterface $alumno
     * @return \Hiberus\Lazaro\Api\Data\AlumnoInterface
     */
    public function save(\Hiberus\Lazaro\Api\Data\AlumnoInterface $alumno);

    /**
     * Get Alumno by an Id
     *
     * @param int $alumnoId
     * @return \Hiberus\Lazaro\Api\Data\AlumnoInterface
     */
    public function getById($alumnoId);

    /**
     * Retrieve alumnos matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return Hiberus\Lazaro\Api\Data\AlumnoSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete a Alumno
     *
     * @param \Hiberus\Lazaro\Api\Data\AlumnoInterface $alumno
     * @return bool
     */
    public function delete(Data\AlumnoInterface $alumno);

    /**
     * Delete a Alumno by an Id
     *
     * @param int $alumnoId
     * @return bool
     */
    public function deleteById($alumnoId);
}
