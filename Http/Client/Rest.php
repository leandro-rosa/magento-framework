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

namespace LeandroRosa\Framework\Http\Client;

use LeandroRosa\Framework\Api\GenericBuildInterface;
use LeandroRosa\Framework\Api\GenericCommandInterface;
use LeandroRosa\Framework\Http\Transfer;
use Magento\Framework\Serialize\Serializer\Json;
use GuzzleHttp\ClientFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ResponseInterface;
use LeandroRosa\Framework\Api\ClientInterface;
use LeandroRosa\Framework\Api\TransferInterface;

class Rest implements ClientInterface
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
     * @var Json
     */
    protected $serializer;

    /**
     * Rest constructor.
     *
     * @param ClientFactory $clientFactory
     * @param LoggerInterface $logger
     * @param Json $serializer
     */
    public function __construct(
        ClientFactory $clientFactory,
        LoggerInterface $logger,
        Json $serializer
    ) {
        $this->clientFactory = $clientFactory;
        $this->logger = $logger;
        $this->serializer = $serializer;
    }

    /**
     * @inheirtDoc
     *
     * @throws GuzzleException
     */
    public function placeRequest(
        TransferInterface $transfer,
        GenericBuildInterface $responseBuild,
        GenericCommandInterface $responseValidator = null
    ) {
        /** @var Client $client */
        $client = $this->clientFactory->create();
        $response = $client->request($transfer->getMethod(), $transfer->getUri(), $transfer->getOptions());
        $responseData = $response->getBody()->getContents();
        try {
            $data = $this->serializer->unserialize($responseData);
        } catch (\Exception $exception) {
            $data = $responseData;
        }

        $this->logRequestResponse($transfer, $data, $response);
        if ($responseValidator) {
            $responseValidator->execute(['response' => $data]);
        }

        return $responseBuild->build(['response' => $data]);
    }

    /**
     * @param Transfer $transfer
     * @param ResponseInterface $response
     * @param $responseData
     *
     * @return void
     */
    protected function logRequestResponse(
        Transfer $transfer,
        ResponseInterface $response,
        $responseData
    ): void {
        $this->logger->debug("/// BEGIN REQUEST ///");
        $this->logger->debug('Request: ', $transfer->getData());
        $this->logger->debug("/// END REQUEST ///");

        $this->logger->debug("/// BEGIN RESPONSE ///");
        $this->logger->debug('Response: ', [
            'response_data' => $responseData,
            'response_header' => $response->getHeaders()
        ]);
        $this->logger->debug("/// END RESPONSE ///");
    }
}
