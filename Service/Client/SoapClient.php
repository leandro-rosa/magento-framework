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

namespace LeandroRosa\Framework\Service\Client;


use LeandroRosa\Framework\Api\ClientInterface;
use LeandroRosa\Framework\Api\GenericBuildInterface;
use LeandroRosa\Framework\Api\GenericCommandInterface;
use LeandroRosa\Framework\Api\TransferInterface;
use Psr\Log\LoggerInterface;
use Laminas\Soap\ClientFactory;
use Laminas\Soap\Client;

/**
 * Class SoapClient
 *
 * @package LeandroRosa\Framework\Service\Client
 */
class SoapClient implements ClientInterface
{
    /**
     * @var ClientFactory
     */
    protected $clientFactory;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var GenericBuildInterface
     */
    protected $responseBuild;

    /**
     * @var GenericCommandInterface
     */
    protected $responseValidator;

    /**
     * SoapClient constructor.
     *
     * @param ClientFactory $clientFactory
     * @param LoggerInterface $logger
     * @param GenericBuildInterface $responseBuild
     * @param GenericCommandInterface $responseValidator
     */
    public function __construct(
        ClientFactory $clientFactory,
        LoggerInterface $logger,
        GenericBuildInterface $responseBuild,
        GenericCommandInterface $responseValidator
    ) {
        $this->clientFactory = $clientFactory;
        $this->logger = $logger;
        $this->responseBuild = $responseBuild;
        $this->responseValidator = $responseValidator;
    }

    /**
     * @inheritDoc
     */
    public function placeRequest(TransferInterface $transfer)
    {
        /** @var Client $client */
        $client = $this->clientFactory->create();

        $options = $transfer->getOptions() ?? [];
        $options['connection_timeout'] = 2;

        $client->setWSDL($transfer->getUri())
            ->setOptions($options);

        $response = $client->call($transfer->getMethod(), $transfer->getParams());

        $this->responseValidator->execute(['response' => $response]);
        $this->logRequestResponse($client);

        return $this->responseBuild->build(['response' => $response, 'transfer' => $transfer]);
    }

    /**
     * @codeCoverageIgnore
     */
    protected function logRequestResponse(Client $client)
    {
        $this->logger->debug("/// BEGIN REQUEST ///");
        $requestStr = $client->getLastRequest();
        $requestStr .= "\r\n";
        $this->logger->debug($requestStr);
        $this->logger->debug("/// END REQUEST ///");

        $this->logger->debug("/// BEGIN RESPONSE ///");
        $responseStr = $client->getLastResponse();
        $responseStr .= "\r\n";

        $this->logger->debug($responseStr);
        $this->logger->debug("/// END RESPONSE ///");
    }
}
