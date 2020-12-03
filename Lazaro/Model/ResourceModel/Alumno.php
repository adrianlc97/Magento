<?php

namespace Hiberus\Lazaro\Model\ResourceModel;

use Exception;
use Magento\Framework\EntityManager\EntityManager;
use Magento\Framework\EntityManager\MetadataPool;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Hiberus\Lazaro\Api\Data\AlumnoInterface;

/**
 * Class Alumno
 * @package Hiberus\Lazaro\Model\ResourceModel
 */
class Alumno extends AbstractDb
{
    /**
     * @var MetadataPool
     */
    private $metadataPool;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param Context $context
     * @param MetadataPool $metadataPool
     * @param EntityManager $entityManager
     * @param string|null $connectionName
     */
    public function __construct(
        Context $context,
        MetadataPool $metadataPool,
        EntityManager $entityManager,
        $connectionName = null
    ) {
        $this->metadataPool = $metadataPool;
        $this->entityManager = $entityManager;
        parent::__construct($context, $connectionName);
    }

    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init(AlumnoInterface::TABLE, AlumnoInterface::ID);
    }


    /**
     * {@inheritDoc}
     */
    public function save(AbstractModel $object)
    {
        $this->entityManager->save($object);
        return $this;
    }

    /**
     * @param AbstractModel $object
     * @param mixed $value
     * @param null $field
     * @return AbstractDb|mixed
     */
    public function load(AbstractModel $object, $value, $field = null)
    {
        return $this->entityManager->load($object, $value);
    }

    /**
     * @param AbstractModel $object
     * @return AbstractDb|void
     * @throws Exception
     */
    public function delete(AbstractModel $object)
    {
        $this->entityManager->delete($object);
    }
}
