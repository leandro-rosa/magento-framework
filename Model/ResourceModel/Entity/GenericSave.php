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


use Magento\Framework\Exception\CouldNotSaveException;
use OneJobCode\Framework\Api\GenericCommandInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\AbstractModel;

class GenericSave implements GenericCommandInterface
{
    /** @var AbstractDb */
    protected $resource;

    /**
     * GenericSave constructor.
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
     * @throws CouldNotSaveException
     */
    public function execute(array $subject = [])
    {
        if (empty($subject['entity']) || ! $subject['entity'] instanceof AbstractModel) {
            throw new \InvalidArgumentException('entity is not object from \Magento\Framework\Model\AbstractModel');
        }

        /** @var AbstractModel $entity */
        $entity = $subject['entity'];

        try {
            $this->resource->save($entity);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $entity;
    }
}
