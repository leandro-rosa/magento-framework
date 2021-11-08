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

namespace OneJobCode\Framework\Command;


use Magento\Framework\ObjectManager\TMapFactory;
use OneJobCode\Framework\Api\GenericCommandInterface;

/**
 * Class AbstractPool
 *
 * @package OneJobCode\Framework\Command
 */
abstract class AbstractPool
{
    /**
     * @var array
     */
    protected $commands;

    /**
     * @var TMapFactory
     */
    protected $tMapFactory;

    /**
     * CommandPool constructor.
     *
     * @param TMapFactory $tMapFactory
     * @param array $commands
     * @param string $type
     */
    public function __construct(
        TMapFactory $tMapFactory,
        array $commands = [],
        string $type = GenericCommandInterface::class
    ) {
        $this->tMapFactory = $tMapFactory;
        $this->commands = $commands;
        $this->prepareCommands($type);
    }

    /**
     * @param string $type
     */
    protected function prepareCommands(string $type)
    {
        $this->commands = $this->tMapFactory->create([
            'array' => $this->commands,
            'type' => $type
        ]);
    }
}
