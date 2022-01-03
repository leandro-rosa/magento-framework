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

namespace LeandroRosa\Framework\Api;

/**
 * Interface GenericCommandInterface
 *
 * @package LeandroRosa\Framework\Api
 */
interface GenericCommandInterface
{
    /**
     * @param array $subject
     *
     * @return void|mixed
     */
    public function execute(array $subject = []);
}
