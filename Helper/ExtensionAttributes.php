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

use Magento\Framework\DataObject;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\Api\ExtensionAttributesInterface;

/**
 * Class ExtensionAttributes
 *
 * @package OneJobCode\Framework\Helper
 */
class ExtensionAttributes extends AbstractHelper
{
    /**
     * @param ExtensionAttributesInterface $extensionAttributes
     *
     * @return array
     */
    public function toArray(ExtensionAttributesInterface $extensionAttributes)
    {
        $result = [];
        foreach ($extensionAttributes->__toArray() as $key => $value) {
            if ($value instanceof DataObject) {
                $result[$key] = $value->getData();
                continue;
            }

            if (is_array($value)) {
                foreach ($value as $item) {
                    $result[$key][] = $item->getData();
                }
                continue;
            }

            $result[$key] = $value;
        }

        return $result;
    }
}
