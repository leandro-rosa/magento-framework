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


use LeandroRosa\Framework\Api\GenericCommandInterface;

/**
 * Class CommandFallBack
 *
 * @package LeandroRosa\Framework\Command
 */
class CommandFallBack implements GenericCommandInterface
{
    /**
     * @inheritDoc
     */
    public function execute(array $subject = [])
    {
        return [];
    }
}
