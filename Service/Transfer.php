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

namespace OneJobCode\Framework\Service;


use Magento\Framework\DataObject;
use OneJobCode\Framework\Api\TransferInterface;

/**
 * Class Transfer
 *
 * @package OneJobCode\Framework\Service
 */
class Transfer extends DataObject implements TransferInterface
{
    /**
     * @inheritDoc
     */
    public function getMethod()
    {
        return $this->getData(static::METHOD);
    }

    /**
     * @inheritDoc
     */
    public function getUri()
    {
        return $this->getData(static::URI);
    }

    /**
     * @inheritDoc
     */
    public function getOptions()
    {
        return $this->getData(static::OPTIONS) ?? [];
    }

    /**
     * @inheritDoc
     */
    public function getParams()
    {
        return $this->getData(static::PARAMS);
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->getData(static::USERNAME);
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->getData(static::PASSWORD);
    }

    /**
     * @inheritDoc
     */
    public function setMethod($value)
    {
        return $this->setData(static::METHOD, $value);
    }

    /**
     * @inheritDoc
     */
    public function setUri($value)
    {
        return $this->setData(static::URI, $value);
    }

    /**
     * @inheritDoc
     */
    public function setOptions(array $value)
    {
        return $this->setData(static::OPTIONS, $value);
    }

    /**
     * @inheritDoc
     */
    public function setParams(array $value)
    {
        return $this->setData(static::PARAMS, $value);
    }

    /**
     * @inheritDoc
     */
    public function setUsername($value)
    {
        return $this->setData(static::USERNAME, $value);
    }

    /**
     * @inheritDoc
     */
    public function setPassword($value)
    {
        return $this->setData(static::PASSWORD, $value);
    }
}
