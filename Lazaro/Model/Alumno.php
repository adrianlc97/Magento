<?php


namespace Hiberus\Lazaro\Model;

use Hiberus\Lazaro\Api\Data\AlumnoInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Alumno
 * @package Hiberus\Lazaro\Model
 */
class Alumno extends AbstractModel implements AlumnoInterface
{

    protected function _construct()
    {
        $this->_init(\Hiberus\Lazaro\Model\ResourceModel\Alumno::class);
    }

    /**
     * @return int|mixed
     */
    public function getId()
    {
        return $this->_getData(self::ID);
    }

    /**
     * @return mixed|string
     */
    public function getFirstName()
    {
        return $this->_getData(self::FIRST_NAME);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_getData(self::LAST_NAME);
    }

    /**
     * @param int|mixed $id
     * @return AlumnoInterface|Alumno|AbstractModel
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @param string $firstName
     * @return AlumnoInterface|Alumno
     */
    public function setFirstName($firstName)
    {
        return $this->setData(self::FIRST_NAME, $firstName);
    }

    /**
     * @param string $lastName
     * @return AlumnoInterface|Alumno
     */
    public function setLastName($lastName)
    {
        return $this->setData(self::LAST_NAME, $lastName);
    }

    /**
     * @return string
     */
    public function getMark()
    {
        return $this->_getData(self::MARK);
    }

    /**
     * @param string $mark
     * @return AlumnoInterface
     */
    public function setMark($mark)
    {
        return $this->setData(self::MARK, $mark);
    }

}
