<?php

declare(strict_types=1);

namespace Carthage\Sdk\Endpoint;

class LogManagementGetLogEntryTagDistributionCollection extends \Carthage\Sdk\Runtime\Client\BaseEndpoint implements \Carthage\Sdk\Runtime\Client\Endpoint
{
    use \Carthage\Sdk\Runtime\Client\EndpointTrait;
    protected $from;
    protected $to;

    /**
     * Get the distribution of log entry tags.
     */
    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{from}', '{to}'], [$this->from, $this->to], '/log-management/log/statistic/entry-tag-distribution/from/{from}/to/{to}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * {@inheritDoc}
     *
     * @return \Carthage\Sdk\Model\LogManagementLogStatisticEntryTagDistributionFromFromToToGetResponse200|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntryTagDistributionFromFromToToGetResponse200', 'json');
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
