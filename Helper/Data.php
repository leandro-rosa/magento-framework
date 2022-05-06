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

namespace LeandroRosa\Framework\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * @param $value
     * @param $mask
     *
     * @return string
     */
    public function mask($value, $mask): string
    {
        $result = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
            if (isset($mask[$i]) && $mask[$i] === '#' && isset($value[$k])) {
                $result .= $value[$k++];
                continue;
            }

            if (isset($mask[$i])) {
                $result .= $mask[$i];
            }
        }

        return $result;
    }
}
