<?php

declare(strict_types=1);

namespace Carthage\Sdk\Endpoint;

class LogManagementGetLogEntryCollection extends \Carthage\Sdk\Runtime\Client\BaseEndpoint implements \Carthage\Sdk\Runtime\Client\Endpoint
{
    use \Carthage\Sdk\Runtime\Client\EndpointTrait;

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
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/log-management/log/entry';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['page', 'items_per_page', 'log_identity', 'before', 'after', 'order', 'source']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['page' => 1, 'items_per_page' => 20, 'order' => 'DESC']);
        $optionsResolver->addAllowedTypes('page', ['int']);
        $optionsResolver->addAllowedTypes('items_per_page', ['int']);
        $optionsResolver->addAllowedTypes('log_identity', ['string', 'null']);
        $optionsResolver->addAllowedTypes('before', ['string', 'null']);
        $optionsResolver->addAllowedTypes('after', ['string', 'null']);
        $optionsResolver->addAllowedTypes('order', ['string']);
        $optionsResolver->addAllowedTypes('source', ['string', 'null']);

        return $optionsResolver;
    }

    /**
     * {@inheritDoc}
     *
     * @throws \Carthage\Sdk\Exception\LogManagementGetLogEntryCollectionBadRequestException
     *
     * @return \Carthage\Sdk\Model\LogManagementLogEntryGetResponse200|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'Carthage\\Sdk\\Model\\LogManagementLogEntryGetResponse200', 'json');
        }
        if (400 === $status) {
            throw new \Carthage\Sdk\Exception\LogManagementGetLogEntryCollectionBadRequestException($response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
