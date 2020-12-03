<?php

namespace Hiberus\Lazaro\Plugin;

use Hiberus\Lazaro\Api\Data\AlumnoInterface;
use Hiberus\Lazaro\Api\Data\AlumnoSearchResultsInterface;
use Hiberus\Lazaro\Api\AlumnoRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class PluginExamen
 * @package Hiberus\Lazaro\Plugin
 */
class PluginExamen
{
    /**
     * @param AlumnoRepositoryInterface $subject
     * @param SearchCriteriaInterface $searchCriteria
     * @return array
     */
    public function beforeGetList(
        AlumnoRepositoryInterface $subject,
        SearchCriteriaInterface $searchCriteria
    ) {
        

        return [$searchCriteria];
    }

    /**
     * @param AlumnoRepositoryInterface $subject
     * @param callable $proceed
     * @param SearchCriteriaInterface $searchCriteria
     * @return AlumnoSearchResultsInterface
     * @throws LocalizedException
     */
    public function aroundGetList(
        AlumnoRepositoryInterface $subject,
        callable $proceed,
        SearchCriteriaInterface $searchCriteria
    ) {
       
            return $proceed($searchCriteria); // Original function call
       
    }

    /**
     * @param AlumnoRepositoryInterface $subject
     * @param AlumnoSearchResultsInterface $result
     * @return AlumnoSearchResultsInterface
     */
    public function afterGetList(
        AlumnoRepositoryInterface $subject,
        $result
    ) {
        /** @var AlumnoInterface $first */
        $myalumnos =$result->getItems();
        foreach($myalumnos as $first){

                if($first->getMark()< 5.00){

                    $first->setMark('4.90');
            }else{

            }

        }
        

        return $result;
    }
}
