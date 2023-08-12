<?php

declare(strict_types=1);

namespace Carthage\Sdk\Normalizer;

use ArrayObject;
use Carthage\Sdk\Runtime\Normalizer\CheckArray;
use Carthage\Sdk\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

use function array_key_exists;
use function is_array;
use function is_object;

class LogManagementLogLogEntryResourcePaginatedCollectionResourceNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryResourcePaginatedCollectionResource' === $type;
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryResourcePaginatedCollectionResource' === $data::class;
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Carthage\Sdk\Model\LogManagementLogLogEntryResourcePaginatedCollectionResource();
        if (null === $data || false === is_array($data)) {
            return $object;
        }
        if (array_key_exists('type', $data)) {
            $object->setType($data['type']);
            unset($data['type']);
        }
        if (array_key_exists('page', $data)) {
            $object->setPage($data['page']);
            unset($data['page']);
        }
        if (array_key_exists('items_per_page', $data)) {
            $object->setItemsPerPage($data['items_per_page']);
            unset($data['items_per_page']);
        }
        if (array_key_exists('total_items', $data)) {
            $object->setTotalItems($data['total_items']);
            unset($data['total_items']);
        }
        if (array_key_exists('first', $data)) {
            $object->setFirst($data['first']);
            unset($data['first']);
        }
        if (array_key_exists('last', $data)) {
            $object->setLast($data['last']);
            unset($data['last']);
        }
        if (array_key_exists('next', $data) && null !== $data['next']) {
            $object->setNext($data['next']);
            unset($data['next']);
        } elseif (array_key_exists('next', $data) && null === $data['next']) {
            $object->setNext(null);
        }
        if (array_key_exists('previous', $data) && null !== $data['previous']) {
            $object->setPrevious($data['previous']);
            unset($data['previous']);
        } elseif (array_key_exists('previous', $data) && null === $data['previous']) {
            $object->setPrevious(null);
        }
        if (array_key_exists('items', $data)) {
            $values = [];
            foreach ($data['items'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryResourcePaginatedCollectionResourceItemsItem', 'json', $context);
            }
            $object->setItems($values);
            unset($data['items']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        $data['type'] = $object->getType();
        $data['page'] = $object->getPage();
        $data['items_per_page'] = $object->getItemsPerPage();
        $data['total_items'] = $object->getTotalItems();
        $data['first'] = $object->getFirst();
        $data['last'] = $object->getLast();
        if ($object->isInitialized('next') && null !== $object->getNext()) {
            $data['next'] = $object->getNext();
        }
        if ($object->isInitialized('previous') && null !== $object->getPrevious()) {
            $data['previous'] = $object->getPrevious();
        }
        $values = [];
        foreach ($object->getItems() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $data['items'] = $values;
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return ['Carthage\\Sdk\\Model\\LogManagementLogLogEntryResourcePaginatedCollectionResource' => false];
    }
}
