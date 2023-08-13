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

class ResponseLogManagementGetLogCollectionOkItemsItemNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogCollectionOkItemsItem' === $type;
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogCollectionOkItemsItem' === $data::class;
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
        $object = new \Carthage\Sdk\Model\ResponseLogManagementGetLogCollectionOkItemsItem();
        if (null === $data || false === is_array($data)) {
            return $object;
        }
        if (array_key_exists('type', $data)) {
            $object->setType($data['type']);
            unset($data['type']);
        }
        if (array_key_exists('identity', $data)) {
            $object->setIdentity($data['identity']);
            unset($data['identity']);
        }
        if (array_key_exists('namespace', $data)) {
            $object->setNamespace($data['namespace']);
            unset($data['namespace']);
        }
        if (array_key_exists('level', $data)) {
            $object->setLevel($this->denormalizer->denormalize($data['level'], 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogCollectionOkItemsItemLevel', 'json', $context));
            unset($data['level']);
        }
        if (array_key_exists('template', $data)) {
            $object->setTemplate($data['template']);
            unset($data['template']);
        }
        if (array_key_exists('first_entry_occurred_at', $data) && null !== $data['first_entry_occurred_at']) {
            $object->setFirstEntryOccurredAt(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['first_entry_occurred_at']));
            unset($data['first_entry_occurred_at']);
        } elseif (array_key_exists('first_entry_occurred_at', $data) && null === $data['first_entry_occurred_at']) {
            $object->setFirstEntryOccurredAt(null);
        }
        if (array_key_exists('last_entry_occurred_at', $data) && null !== $data['last_entry_occurred_at']) {
            $object->setLastEntryOccurredAt(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['last_entry_occurred_at']));
            unset($data['last_entry_occurred_at']);
        } elseif (array_key_exists('last_entry_occurred_at', $data) && null === $data['last_entry_occurred_at']) {
            $object->setLastEntryOccurredAt(null);
        }
        if (array_key_exists('created_at', $data)) {
            $object->setCreatedAt(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['created_at']));
            unset($data['created_at']);
        }
        if (array_key_exists('updated_at', $data)) {
            $object->setUpdatedAt(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['updated_at']));
            unset($data['updated_at']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
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
        $data['identity'] = $object->getIdentity();
        $data['namespace'] = $object->getNamespace();
        $data['level'] = $this->normalizer->normalize($object->getLevel(), 'json', $context);
        $data['template'] = $object->getTemplate();
        if ($object->isInitialized('firstEntryOccurredAt') && null !== $object->getFirstEntryOccurredAt()) {
            $data['first_entry_occurred_at'] = $object->getFirstEntryOccurredAt()->format('Y-m-d\\TH:i:sP');
        }
        if ($object->isInitialized('lastEntryOccurredAt') && null !== $object->getLastEntryOccurredAt()) {
            $data['last_entry_occurred_at'] = $object->getLastEntryOccurredAt()->format('Y-m-d\\TH:i:sP');
        }
        $data['created_at'] = $object->getCreatedAt()->format('Y-m-d\\TH:i:sP');
        $data['updated_at'] = $object->getUpdatedAt()->format('Y-m-d\\TH:i:sP');
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return ['Carthage\\Sdk\\Model\\ResponseLogManagementGetLogCollectionOkItemsItem' => false];
    }
}
