<?php
/**
 * LeandroRosa
 *
 * NOTICE OF LICENSE
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to https://github.com/leandro-rosa for more information.
 *
 * @category LeandroRosa
 *
 * @copyright Copyright (c) 2021 Leandro Rosa (https://github.com/leandro-rosa)
 *
 * @author Leandro Rosa <dev.leandrorosa@gmail.com>
 */
declare(strict_types=1);

namespace LeandroRosa\Framework\Api;

use Magento\Framework\Api\Search\DocumentInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Interface GenericRepositoryInterface
 *
 * @package LeandroRosa\Framework\Api
 */
interface GenericRepositoryInterface
{
    const COMMAND_GET           = 'get';
    const COMMAND_SAVE          = 'save';
    const COMMAND_GET_LIST      = 'getList';
    const COMMAND_DELETE        = 'delete';

    /**
     * @param AbstractModel $entity
     *
     * @return AbstractModel
     */
    public function save(AbstractModel $entity): AbstractModel;

    /**
     * @param string|int $value
     * @param null|string $field
     *
     * @return AbstractModel
     */
    public function get($value, $field = null): AbstractModel;

    /**
     * @param AbstractModel $entity
     *
     * @return bool
     */
    public function delete(AbstractModel $entity): bool;

    /**
     * @param int $entityId
     *
     * @return bool
     */
    public function deleteById($entityId): bool;

    /**
     * @param SearchCriteriaInterface $criteria
     *
     * @return bool
     */
    public function deleteByCriteria(SearchCriteriaInterface $criteria): bool;

    /**
     * @param SearchCriteriaInterface $criteria
     *
     * @return DocumentInterface[]
     */
    public function getList(SearchCriteriaInterface $criteria): array;
}
