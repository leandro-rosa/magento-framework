<?php
/**
 * OneJobCode
 *
 * NOTICE OF LICENSE
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to https://www.onejobcode.com for more information.
 *
 * @category OneJobCode
 *
 * @copyright Copyright (c) 2021 One Job Code (https://www.onejobcode.com)
 *
 * @author One Job Code <engineer@onejobcode.com>
 */
declare(strict_types=1);

namespace OneJobCode\Framework\Model\ResourceModel\Entity;


use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use OneJobCode\Framework\Api\GenericCommandInterface;

abstract class AbstractGenericGet implements GenericCommandInterface
{
    /**
     * @var AbstractDb
     */
    protected $resource;

    protected $entityFactory;

    /**
     * AbstractGenericGet constructor.
     *
     * @param AbstractDb $resource
     */
    public function __construct(
        AbstractDb $resource
    ) {
        $this->resource = $resource;
    }

    /**
     * @param array $subject
     *
     * @return AbstractModel
     *
     * @throws NoSuchEntityException
     */
    public function execute(array $subject = [])
    {
        if (empty($subject['value'])) {
            throw new \InvalidArgumentException('value is empty.');
        }

        $entity = $this->entityFactory->create();

        $field = empty($subject['field']) ? null : $subject['field'];
        $this->resource->load($entity, $subject['value'], $field);

        if (!$entity->getId()) {
            throw new NoSuchEntityException(__('The entity with the "%1" %2 doesn\'t exist.', $subject['value'], $field ?: 'ID'));
        }

        return $entity;
    }
}
