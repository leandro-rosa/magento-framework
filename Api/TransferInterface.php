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

namespace OneJobCode\Framework\Api;

/**
 * Interface TransferInterface
 *
 * @package OneJobCode\Framework\Api
 */
interface TransferInterface
{
    const METHOD = 'method';
    const URI = 'uri';
    const OPTIONS = 'options';
    const ENDPOINT = 'endpoint';
    const PARAMS = 'params';
    const USERNAME = 'username';
    const PASSWORD = 'password';

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @return string
     */
    public function getUri();

    /**
     * @return array
     */
    public function getOptions();

    /**
     * @return array
     */
    public function getParams();

    /**
     * @return string
     */
    public function getUsername();

    /**
     * @return string
     */
    public function getPassword();

    /**
     * @param string $value
     * @return self
     */
    public function setMethod($value);

    /**
     * @param string $value
     * @return self
     */
    public function setUri($value);

    /**
     * @param array $value
     * @return self
     */
    public function setOptions(array $value);

    /**
     * @param array $value
     * @return self
     */
    public function setParams(array $value);

    /**
     * @param string $value
     * @return self
     */
    public function setUsername($value);

    /**
     * @param string $value
     * @return self
     */
    public function setPassword($value);
}
