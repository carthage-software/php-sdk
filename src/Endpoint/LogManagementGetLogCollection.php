<?php

declare(strict_types=1);

namespace Carthage\Sdk\Endpoint;

class LogManagementGetLogCollection extends \Carthage\Sdk\Runtime\Client\BaseEndpoint implements \Carthage\Sdk\Runtime\Client\Endpoint
{
    use \Carthage\Sdk\Runtime\Client\EndpointTrait;

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
        return '/log-management/log';
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
        $optionsResolver->setDefined(['contains', 'levels', 'from', 'to', 'sort_by', 'order', 'page', 'items_per_page']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['levels' => [0 => 100, 1 => 200, 2 => 250, 3 => 300, 4 => 400, 5 => 500, 6 => 550, 7 => 600], 'sort_by' => 'lastEntryOccurredAt', 'order' => 'DESC', 'page' => 1, 'items_per_page' => 20]);
        $optionsResolver->addAllowedTypes('contains', ['string', 'null']);
        $optionsResolver->addAllowedTypes('levels', ['array']);
        $optionsResolver->addAllowedTypes('from', ['string', 'null']);
        $optionsResolver->addAllowedTypes('to', ['string', 'null']);
        $optionsResolver->addAllowedTypes('sort_by', ['string']);
        $optionsResolver->addAllowedTypes('order', ['string']);
        $optionsResolver->addAllowedTypes('page', ['int']);
        $optionsResolver->addAllowedTypes('items_per_page', ['int']);

        return $optionsResolver;
    }

    /**
     * {@inheritDoc}
     *
     * @throws \Carthage\Sdk\Exception\LogManagementGetLogCollectionBadRequestException
     *
     * @return \Carthage\Sdk\Model\LogManagementLogGetResponse200|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'Carthage\\Sdk\\Model\\LogManagementLogGetResponse200', 'json');
        }
        if (400 === $status) {
            throw new \Carthage\Sdk\Exception\LogManagementGetLogCollectionBadRequestException($response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
