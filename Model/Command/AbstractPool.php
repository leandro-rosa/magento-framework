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
declare(strict_types=1);

namespace LeandroRosa\Framework\Model\Command;

use Magento\Framework\ObjectManager\TMapFactory;
use LeandroRosa\Framework\Api\GenericCommandInterface;

abstract class AbstractPool
{
    /**
     * @var array
     */
    protected $commands = [];

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
        $this->init($type);
    }

    /**
     * @param string $type
     *
     * @return void
     */
    protected function init(string $type): void
    {
        $this->commands = $this->tMapFactory->create([
            'array' => $this->commands,
            'type' => $type
        ]);
    }
}
