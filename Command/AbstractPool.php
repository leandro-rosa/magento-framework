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

namespace LeandroRosa\Framework\Command;


use Magento\Framework\ObjectManager\TMapFactory;
use LeandroRosa\Framework\Api\GenericCommandInterface;

/**
 * Class AbstractPool
 *
 * @package LeandroRosa\Framework\Command
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
