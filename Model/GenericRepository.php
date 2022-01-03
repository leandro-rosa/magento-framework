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

namespace LeandroRosa\Framework\Model;


use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Model\AbstractModel;
use LeandroRosa\Framework\Api\CommandPoolInterface;
use LeandroRosa\Framework\Api\GenericRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Class GenericRepository
 *
 * @package LeandroRosa\Framework\Model
 */
class GenericRepository implements GenericRepositoryInterface
{
    /**
     * @var CommandPoolInterface
     */
    protected $commandPool;

    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * GenericRepository constructor.
     *
     * @param CommandPoolInterface $commandPool
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        CommandPoolInterface $commandPool,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->commandPool = $commandPool;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @inheritdoc
     */
    public function save(AbstractModel $entity): AbstractModel
    {
        $command =  $this->commandPool->get(self::COMMAND_SAVE);
        return $command->execute(['entity' => $entity]);
    }

    /**
     * @inheritdoc
     */
    public function get($value, $field = null): AbstractModel
    {
        $command =  $this->commandPool->get(self::COMMAND_GET);
        return $command->execute(['value' => $value, 'field' => $field]);
    }

    /**
     * @inheritdoc
     */
    public function delete(AbstractModel $entity): bool
    {
        $command =  $this->commandPool->get(self::COMMAND_DELETE);
        return $command->execute(['entity' => $entity]);
    }

    /**
     * @inheritdoc
     */
    public function deleteById($entityId): bool
    {
        $entity =  $this->commandPool->get(self::COMMAND_GET)->execute(['value' => $entityId]);
        return $this->delete($entity);
    }

    /**
     * @inheritdoc
     */
    public function deleteByCriteria(SearchCriteriaInterface $criteria): bool
    {
        $items = $this->getList($criteria);

        foreach ($items as $item) {
            $this->delete($item);
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $criteria): array
    {
        $command =  $this->commandPool->get(self::COMMAND_GET_LIST);
        return $command->execute(['criteria' => $criteria]);
    }
}
