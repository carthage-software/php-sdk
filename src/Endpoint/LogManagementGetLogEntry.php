<?php

declare(strict_types=1);

namespace Carthage\Sdk\Endpoint;

class LogManagementGetLogEntry extends \Carthage\Sdk\Runtime\Client\BaseEndpoint implements \Carthage\Sdk\Runtime\Client\Endpoint
{
    use \Carthage\Sdk\Runtime\Client\EndpointTrait;
    protected $identity;

    /**
     * Get a log entry by its identity.
     */
    public function __construct(string $identity)
    {
        $this->identity = $identity;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{identity}'], [$this->identity], '/log-management/log/entry/{identity}');
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
     * @throws \Carthage\Sdk\Exception\LogManagementGetLogEntryNotFoundException
     *
     * @return \Carthage\Sdk\Model\LogManagementLogEntryIdentityGetResponse200|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'Carthage\\Sdk\\Model\\LogManagementLogEntryIdentityGetResponse200', 'json');
        }
        if (404 === $status) {
            throw new \Carthage\Sdk\Exception\LogManagementGetLogEntryNotFoundException($response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
