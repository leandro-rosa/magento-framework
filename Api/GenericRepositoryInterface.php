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
 * @copyright Copyright (c) 2022 Leandro Rosa (https://github.com/leandro-rosa)
 *
 * @author Leandro Rosa <dev.leandrorosa@gmail.com>
 */

namespace LeandroRosa\Framework\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Model\AbstractModel;

interface GenericRepositoryInterface
{
    /**
     * @param mixed $entity
     *
     * @return mixed
     */
    public function save(AbstractModel $entity);

    /**
     * @param string|int|mixed $value
     * @param null|string $field
     *
     * @return mixed
     */
    public function get($value, $field = null);

    /**
     * @param mixed $entity
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
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria): SearchResultsInterface;
}
