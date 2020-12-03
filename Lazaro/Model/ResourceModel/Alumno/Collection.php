<?php


namespace Hiberus\Lazaro\Model\ResourceModel\Alumno;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Hiberus\Lazaro\Model;

/**
 * Class Collection
 * @package Hiberus\Lazaro\Model\ResourceModel\Alumno
 */
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model\Alumno::class, Model\ResourceModel\Alumno::class);
    }
}
