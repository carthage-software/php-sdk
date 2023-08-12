<?php

declare(strict_types=1);

namespace Carthage\Sdk\Endpoint;

class LogManagementCreateLogEntry extends \Carthage\Sdk\Runtime\Client\BaseEndpoint implements \Carthage\Sdk\Runtime\Client\Endpoint
{
    use \Carthage\Sdk\Runtime\Client\EndpointTrait;

    /**
     * Create a new log entry.
     */
    public function __construct(?\Carthage\Sdk\Model\LogManagementLogEntryPostBody $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/log-management/log/entry';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Carthage\Sdk\Model\LogManagementLogEntryPostBody) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * {@inheritDoc}
     *
     * @throws \Carthage\Sdk\Exception\LogManagementCreateLogEntryBadRequestException
     * @throws \Carthage\Sdk\Exception\LogManagementCreateLogEntryNotFoundException
     *
     * @return \Carthage\Sdk\Model\LogManagementLogEntryPostResponse200|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'Carthage\\Sdk\\Model\\LogManagementLogEntryPostResponse200', 'json');
        }
        if (400 === $status) {
            throw new \Carthage\Sdk\Exception\LogManagementCreateLogEntryBadRequestException($response);
        }
        if (404 === $status) {
            throw new \Carthage\Sdk\Exception\LogManagementCreateLogEntryNotFoundException($response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
