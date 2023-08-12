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

class LogManagementCollectPostBodyCollectLogsItemNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return 'Carthage\\Sdk\\Model\\LogManagementCollectPostBodyCollectLogsItem' === $type;
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && 'Carthage\\Sdk\\Model\\LogManagementCollectPostBodyCollectLogsItem' === $data::class;
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
        $object = new \Carthage\Sdk\Model\LogManagementCollectPostBodyCollectLogsItem();
        if (null === $data || false === is_array($data)) {
            return $object;
        }
        if (array_key_exists('log', $data)) {
            $object->setLog($this->denormalizer->denormalize($data['log'], 'Carthage\\Sdk\\Model\\LogManagementCollectPostBodyCollectLogsItemLog', 'json', $context));
            unset($data['log']);
        }
        if (array_key_exists('entries', $data)) {
            $values = [];
            foreach ($data['entries'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Carthage\\Sdk\\Model\\LogManagementCollectPostBodyCollectLogsItemEntriesItem', 'json', $context);
            }
            $object->setEntries($values);
            unset($data['entries']);
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
        $data['log'] = $this->normalizer->normalize($object->getLog(), 'json', $context);
        $values = [];
        foreach ($object->getEntries() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $data['entries'] = $values;
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return ['Carthage\\Sdk\\Model\\LogManagementCollectPostBodyCollectLogsItem' => false];
    }
}
