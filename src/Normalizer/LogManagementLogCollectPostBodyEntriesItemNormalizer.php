<?php

declare(strict_types=1);

namespace Carthage\Sdk\Normalizer;

use ArrayObject;
use Carthage\Sdk\Runtime\Normalizer\CheckArray;
use Carthage\Sdk\Runtime\Normalizer\ValidatorTrait;
use DateTime;
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

class LogManagementLogCollectPostBodyEntriesItemNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return 'Carthage\\Sdk\\Model\\LogManagementLogCollectPostBodyEntriesItem' === $type;
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && 'Carthage\\Sdk\\Model\\LogManagementLogCollectPostBodyEntriesItem' === $data::class;
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
        $object = new \Carthage\Sdk\Model\LogManagementLogCollectPostBodyEntriesItem();
        if (null === $data || false === is_array($data)) {
            return $object;
        }
        if (array_key_exists('source', $data)) {
            $object->setSource($data['source']);
            unset($data['source']);
        }
        if (array_key_exists('context', $data)) {
            $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['context'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setContext($values);
            unset($data['context']);
        }
        if (array_key_exists('attributes', $data)) {
            $values_1 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['attributes'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setAttributes($values_1);
            unset($data['attributes']);
        }
        if (array_key_exists('tags', $data)) {
            $values_2 = [];
            foreach ($data['tags'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setTags($values_2);
            unset($data['tags']);
        }
        if (array_key_exists('occurred_at', $data)) {
            $object->setOccurredAt(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['occurred_at']));
            unset($data['occurred_at']);
        }
        foreach ($data as $key_2 => $value_3) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_3;
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
        $data['source'] = $object->getSource();
        $values = [];
        foreach ($object->getContext() as $key => $value) {
            $values[$key] = $value;
        }
        $data['context'] = $values;
        $values_1 = [];
        foreach ($object->getAttributes() as $key_1 => $value_1) {
            $values_1[$key_1] = $value_1;
        }
        $data['attributes'] = $values_1;
        $values_2 = [];
        foreach ($object->getTags() as $value_2) {
            $values_2[] = $value_2;
        }
        $data['tags'] = $values_2;
        $data['occurred_at'] = $object->getOccurredAt()->format('Y-m-d\\TH:i:sP');
        foreach ($object as $key_2 => $value_3) {
            if (preg_match('/.*/', (string) $key_2)) {
                $data[$key_2] = $value_3;
            }
        }

        return $data;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return ['Carthage\\Sdk\\Model\\LogManagementLogCollectPostBodyEntriesItem' => false];
    }
}
