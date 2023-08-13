<?php

declare(strict_types=1);

namespace Carthage\Sdk;

use function count;

class Client extends \Carthage\Sdk\Runtime\Client\Client
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Carthage\Sdk\Model\PingGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function ping(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\Ping(), $fetch);
    }

    /**
     * Collect multiple log entries, for multiple logs.
     *
     * @param \Carthage\Sdk\Model\LogManagementCollectPostBody|null $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Carthage\Sdk\Exception\LogManagementCollectBadRequestException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementCollect(?Model\LogManagementCollectPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementCollect($requestBody), $fetch);
    }

    /**
     * Retrieve a collection of logs.
     *
     * @param array $queryParameters {
     *
     * @var string $contains
     * @var array $levels[]
     * @var string $from
     * @var string $to
     * @var string $sort_by
     * @var string $order
     * @var int $page The page number for pagination. Defaults to 1.
     * @var int $items_per_page The number of items per page for pagination. Defaults to 20, with a maximum of 2000.
     *          }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Carthage\Sdk\Exception\LogManagementGetLogCollectionBadRequestException
     *
     * @return \Carthage\Sdk\Model\LogManagementLogGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementGetLogCollection(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementGetLogCollection($queryParameters), $fetch);
    }

    /**
     * Create a new log.
     *
     * @param \Carthage\Sdk\Model\LogManagementLogPostBody|null $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Carthage\Sdk\Exception\LogManagementCreateLogBadRequestException
     * @throws \Carthage\Sdk\Exception\LogManagementCreateLogConflictException
     *
     * @return \Carthage\Sdk\Model\LogManagementLogPostResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementCreateLog(?Model\LogManagementLogPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementCreateLog($requestBody), $fetch);
    }

    /**
     * Delete a log by identity.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Carthage\Sdk\Exception\LogManagementDeleteLogNotFoundException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementDeleteLog(string $identity, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementDeleteLog($identity), $fetch);
    }

    /**
     * Get a log by its identity.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Carthage\Sdk\Exception\LogManagementGetLogNotFoundException
     *
     * @return \Carthage\Sdk\Model\LogManagementLogIdentityGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementGetLog(string $identity, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementGetLog($identity), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Carthage\Sdk\Model\LogManagementLogNamespaceGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementGetLogNamespaceCollection(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementGetLogNamespaceCollection(), $fetch);
    }

    /**
     * Retrieve a collection of log entries.
     *
     * @param array $queryParameters {
     *
     * @var int $page The page number for pagination. Defaults to 1.
     * @var int $items_per_page The number of items per page for pagination. Defaults to 20, with a maximum of 2000.
     * @var string $log_identity
     * @var string $before
     * @var string $after
     * @var string $order
     * @var string $source
     *             }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Carthage\Sdk\Exception\LogManagementGetLogEntryCollectionBadRequestException
     *
     * @return \Carthage\Sdk\Model\LogManagementLogEntryGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementGetLogEntryCollection(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementGetLogEntryCollection($queryParameters), $fetch);
    }

    /**
     * Create a new log entry.
     *
     * @param \Carthage\Sdk\Model\LogManagementLogEntryPostBody|null $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Carthage\Sdk\Exception\LogManagementCreateLogEntryBadRequestException
     * @throws \Carthage\Sdk\Exception\LogManagementCreateLogEntryNotFoundException
     *
     * @return \Carthage\Sdk\Model\LogManagementLogEntryPostResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementCreateLogEntry(?Model\LogManagementLogEntryPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementCreateLogEntry($requestBody), $fetch);
    }

    /**
     * Delete a log entry by identity.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Carthage\Sdk\Exception\LogManagementDeleteLogEntryNotFoundException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementDeleteLogEntry(string $identity, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementDeleteLogEntry($identity), $fetch);
    }

    /**
     * Get a log entry by its identity.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Carthage\Sdk\Exception\LogManagementGetLogEntryNotFoundException
     *
     * @return \Carthage\Sdk\Model\LogManagementLogEntryIdentityGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementGetLogEntry(string $identity, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementGetLogEntry($identity), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Carthage\Sdk\Model\LogManagementLogEntryTagGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementGetLogEntryTagCollection(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementGetLogEntryTagCollection(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Carthage\Sdk\Model\LogManagementLogEntrySourceGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementGetLogEntrySourceCollection(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementGetLogEntrySourceCollection(), $fetch);
    }

    /**
     * Collect log entries from a log.
     *
     * @param \Carthage\Sdk\Model\LogManagementLogCollectPostBody|null $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Carthage\Sdk\Exception\LogManagementCollectLogBadRequestException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementCollectLog(?Model\LogManagementLogCollectPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementCollectLog($requestBody), $fetch);
    }

    /**
     * Get the frequency count of log entries.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Carthage\Sdk\Model\LogManagementLogStatisticEntryFrequencyCountFrequencyGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementGetLogEntryFrequencyCountCollection(string $frequency, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementGetLogEntryFrequencyCountCollection($frequency), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Carthage\Sdk\Model\LogManagementLogStatisticEntrySourceFrequencyGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementGetLogEntrySourceFrequencyCollection(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementGetLogEntrySourceFrequencyCollection(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Carthage\Sdk\Model\LogManagementLogStatisticEntryTagDistributionGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementGetLogEntryTagDistributionCollection(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementGetLogEntryTagDistributionCollection(), $fetch);
    }

    /**
     * Get the frequency count of logs.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Carthage\Sdk\Model\LogManagementLogStatisticFrequencyCountFrequencyGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementGetLogFrequencyCountCollection(string $frequency, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementGetLogFrequencyCountCollection($frequency), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Carthage\Sdk\Model\LogManagementLogStatisticLevelStatisticsGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function logManagementGetLogLevelStatisticsCollection(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Carthage\Sdk\Endpoint\LogManagementGetLogLevelStatisticsCollection(), $fetch);
    }

    public static function create($httpClient = null, array $additionalPlugins = [], array $additionalNormalizers = [])
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = [];
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = [new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \Carthage\Sdk\Normalizer\JaneObjectNormalizer()];
        if (count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, [new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(['json_decode_associative' => true]))]);

        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
