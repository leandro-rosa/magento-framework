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

namespace LeandroRosa\Framework\Helper;


use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Class Data
 *
 * @package LeandroRosa\Framework\Helper
 */
class Data extends AbstractHelper
{
    /**
     * @param $val
     * @param $mask
     *
     * @return string
     */
    public function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
            if ($mask[$i] == '#') {
                if (isset($val[$k])) {
                    $maskared .= $val[$k++];
                }
                continue;
            }

            if (isset($mask[$i])) {
                $maskared .= $mask[$i];
            }
        }

        return $maskared;
    }
}
