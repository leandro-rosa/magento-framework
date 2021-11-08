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


use OneJobCode\Framework\Api\GenericCommandInterface;

/**
 * Class CommandChain
 *
 * @package OneJobCode\Framework\Command
 */
class CommandChain extends AbstractPool implements GenericCommandInterface
{
    /**
     * @inheritDoc
     */
    public function execute(array $subject = [])
    {
        $result = [];
        /** @var GenericCommandInterface $command */
        foreach ($this->commands as  $code => $command) {
            $result[$code] = $command->execute($subject);
        }

        return $result;
    }
}
