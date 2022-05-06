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

namespace LeandroRosa\Framework\Http;

use Magento\Framework\DataObject;
use LeandroRosa\Framework\Api\TransferInterface;

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
