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

use LeandroRosa\Framework\Api\CommandPoolInterface;
use LeandroRosa\Framework\Api\GenericCommandInterface;
use Magento\Framework\Exception\NotFoundException;

use function __;

class CommandPool extends AbstractPool implements CommandPoolInterface
{
    /**
     * @param string $command
     *
     * @return mixed|GenericCommandInterface
     *
     * @throws NotFoundException
     */
    public function get(string $command)
    {
        if (!isset($this->commands[$command])) {
            throw new NotFoundException(__('Command %1 does not exist.', $command));
        }

        return $this->commands[$command];
    }
}
