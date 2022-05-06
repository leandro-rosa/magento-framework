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

namespace LeandroRosa\Framework\Api;

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
     * @return string|null
     */
    public function getMethod(): ?string;

    /**
     * @return string|null
     */
    public function getUri(): ?string;

    /**
     * @return array|null
     */
    public function getOptions(): ?array;

    /**
     * @return array|null
     */
    public function getParams(): ?array;

    /**
     * @return string|null
     */
    public function getUsername(): ?string;

    /**
     * @return string|null
     */
    public function getPassword(): ?string;

    /**
     * @param string $value
     *
     * @return self
     */
    public function setMethod(string $value): self;

    /**
     * @param string $value
     *
     * @return self
     */
    public function setUri(string $value): self;

    /**
     * @param array $value
     *
     * @return self
     */
    public function setOptions(array $value): self;

    /**
     * @param array $value
     *
     * @return self
     */
    public function setParams(array $value): self;

    /**
     * @param string $value
     *
     * @return self
     */
    public function setUsername(string $value): self;

    /**
     * @param string $value
     *
     * @return self
     */
    public function setPassword(string $value): self;
}
