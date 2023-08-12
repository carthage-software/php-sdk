<?php

declare(strict_types=1);

namespace Carthage\Sdk\Endpoint;

class LogManagementDeleteLog extends \Carthage\Sdk\Runtime\Client\BaseEndpoint implements \Carthage\Sdk\Runtime\Client\Endpoint
{
    use \Carthage\Sdk\Runtime\Client\EndpointTrait;
    protected $identity;

    /**
     * Delete a log by identity.
     */
    public function __construct(string $identity)
    {
        $this->identity = $identity;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{identity}'], [$this->identity], '/log-management/log/{identity}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    /**
     * {@inheritDoc}
     *
     * @throws \Carthage\Sdk\Exception\LogManagementDeleteLogNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (404 === $status) {
            throw new \Carthage\Sdk\Exception\LogManagementDeleteLogNotFoundException($response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
