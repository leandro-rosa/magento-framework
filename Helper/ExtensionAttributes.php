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

use Magento\Framework\DataObject;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\Api\ExtensionAttributesInterface;

class ExtensionAttributes extends AbstractHelper
{
    /**
     * @param ExtensionAttributesInterface $extensionAttributes
     *
     * @return array
     */
    public function toArray(ExtensionAttributesInterface $extensionAttributes): array
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
