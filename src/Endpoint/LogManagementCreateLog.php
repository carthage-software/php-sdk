<?php

declare(strict_types=1);

namespace Carthage\Sdk\Endpoint;

class LogManagementCreateLog extends \Carthage\Sdk\Runtime\Client\BaseEndpoint implements \Carthage\Sdk\Runtime\Client\Endpoint
{
    use \Carthage\Sdk\Runtime\Client\EndpointTrait;

    /**
     * Create a new log.
     */
    public function __construct(?\Carthage\Sdk\Model\LogManagementLogPostBody $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/log-management/log';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Carthage\Sdk\Model\LogManagementLogPostBody) {
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
     * @throws \Carthage\Sdk\Exception\LogManagementCreateLogBadRequestException
     * @throws \Carthage\Sdk\Exception\LogManagementCreateLogConflictException
     *
     * @return \Carthage\Sdk\Model\LogManagementLogPostResponse200|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'Carthage\\Sdk\\Model\\LogManagementLogPostResponse200', 'json');
        }
        if (400 === $status) {
            throw new \Carthage\Sdk\Exception\LogManagementCreateLogBadRequestException($response);
        }
        if (409 === $status) {
            throw new \Carthage\Sdk\Exception\LogManagementCreateLogConflictException($response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
