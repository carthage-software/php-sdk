<?php

declare(strict_types=1);

namespace Carthage\Sdk\Endpoint;

class LogManagementGetLogEntryFrequencyCountCollection extends \Carthage\Sdk\Runtime\Client\BaseEndpoint implements \Carthage\Sdk\Runtime\Client\Endpoint
{
    use \Carthage\Sdk\Runtime\Client\EndpointTrait;
    protected $frequency;
    protected $from;
    protected $to;

    /**
     * Get the frequency count of log entries.
     */
    public function __construct(string $frequency, string $from, string $to)
    {
        $this->frequency = $frequency;
        $this->from = $from;
        $this->to = $to;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{frequency}', '{from}', '{to}'], [$this->frequency, $this->from, $this->to], '/log-management/log/statistic/entry-frequency-count/{frequency}/from/{from}/to/{to}');
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
     * @return \Carthage\Sdk\Model\LogManagementLogStatisticEntryFrequencyCountFrequencyFromFromToToGetResponse200|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntryFrequencyCountFrequencyFromFromToToGetResponse200', 'json');
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
