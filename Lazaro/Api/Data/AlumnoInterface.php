<?php


namespace Hiberus\Lazaro\Api\Data;

/**
 * Interface AlumnoInterface
 * @package Hiberus\Lazaro\Api\Data
 */
interface AlumnoInterface
{
    const   TABLE   =   'hiberus_exam';

    const   ID      =   'exam_id';
    const   FIRST_NAME   =   'firstname';
    const   LAST_NAME    =   'lastname';
    const   MARK  =   'mark';
   

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return AlumnoInterface
     */
    public function setId($id);

    /**
     * @param string $firstName
     * @return AlumnoInterface
     */
    public function setFirstName($firstName);

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param string $lastName
     * @return AlumnoInterface
     */
    public function setLastName($lastName);

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @return float
     */
    public function getMark();

    /**
     * @param float $mark
     * @return AlumnoInterface
     */
    public function setMark($mark);

    
}
