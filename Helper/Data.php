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

namespace OneJobCode\Framework\Helper;


use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Class Data
 *
 * @package OneJobCode\Framework\Helper
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
