<?php

declare(strict_types=1);

namespace Carthage\Sdk\Normalizer;

use ArrayObject;
use Carthage\Sdk\Runtime\Normalizer\CheckArray;
use Carthage\Sdk\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

use function array_key_exists;
use function is_object;

class JaneObjectNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;
    protected $normalizers = ['Carthage\\Sdk\\Model\\SharedPingResource' => 'Carthage\\Sdk\\Normalizer\\SharedPingResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogCreateLog' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogCreateLogNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogCollectLogEntry' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogCollectLogEntryNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogCollectLog' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogCollectLogNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogCollectLogLog' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogCollectLogLogNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogCollectLogEntriesItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogCollectLogEntriesItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementCollect' => 'Carthage\\Sdk\\Normalizer\\LogManagementCollectNormalizer', 'Carthage\\Sdk\\Model\\LogManagementCollectCollectLogsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementCollectCollectLogsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementCollectCollectLogsItemLog' => 'Carthage\\Sdk\\Normalizer\\LogManagementCollectCollectLogsItemLogNormalizer', 'Carthage\\Sdk\\Model\\LogManagementCollectCollectLogsItemEntriesItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementCollectCollectLogsItemEntriesItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogResourceLevel' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogResourceLevelNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogResourcePaginatedCollectionResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogResourcePaginatedCollectionResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogResourcePaginatedCollectionResourceItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogResourcePaginatedCollectionResourceItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogResourcePaginatedCollectionResourceItemsItemLevel' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogResourcePaginatedCollectionResourceItemsItemLevelNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogNamespaceResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogNamespaceResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogNamespaceResourceCollectionResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogNamespaceResourceCollectionResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogNamespaceResourceCollectionResourceItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogNamespaceResourceCollectionResourceItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogEntryResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryResourcePaginatedCollectionResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogEntryResourcePaginatedCollectionResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryResourcePaginatedCollectionResourceItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogEntryResourcePaginatedCollectionResourceItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogCreateLogEntry' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogCreateLogEntryNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryTagResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogEntryTagResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryTagResourceCollectionResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogEntryTagResourceCollectionResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryTagResourceCollectionResourceItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogEntryTagResourceCollectionResourceItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogEntrySourceResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogEntrySourceResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogEntrySourceResourceCollectionResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogEntrySourceResourceCollectionResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogLogEntrySourceResourceCollectionResourceItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogLogEntrySourceResourceCollectionResourceItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntryFrequencyCountResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogEntryFrequencyCountResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntryFrequencyCountResourceCollectionResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogEntryFrequencyCountResourceCollectionResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntryFrequencyCountResourceCollectionResourceItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogEntryFrequencyCountResourceCollectionResourceItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntrySourceFrequencyResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogEntrySourceFrequencyResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntrySourceFrequencyResourceCollectionResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogEntrySourceFrequencyResourceCollectionResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntrySourceFrequencyResourceCollectionResourceItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogEntrySourceFrequencyResourceCollectionResourceItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntryTagDistributionResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogEntryTagDistributionResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntryTagDistributionResourceCollectionResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogEntryTagDistributionResourceCollectionResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntryTagDistributionResourceCollectionResourceItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogEntryTagDistributionResourceCollectionResourceItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogFrequencyCountResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogFrequencyCountResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogFrequencyCountResourceCollectionResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogFrequencyCountResourceCollectionResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogFrequencyCountResourceCollectionResourceItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogFrequencyCountResourceCollectionResourceItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogLevelStatisticsResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogLevelStatisticsResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogLevelStatisticsResourceLevel' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogLevelStatisticsResourceLevelNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogLevelStatisticsResourceCollectionResource' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogLevelStatisticsResourceCollectionResourceNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogLevelStatisticsResourceCollectionResourceItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogLevelStatisticsResourceCollectionResourceItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogLevelStatisticsResourceCollectionResourceItemsItemLevel' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticsLogLevelStatisticsResourceCollectionResourceItemsItemLevelNormalizer', 'Carthage\\Sdk\\Model\\ResponsePingOk' => 'Carthage\\Sdk\\Normalizer\\ResponsePingOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogCollectionOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogCollectionOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogCollectionOkItemsItem' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogCollectionOkItemsItemNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogCollectionOkItemsItemLevel' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogCollectionOkItemsItemLevelNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementCreateLogOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementCreateLogOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementCreateLogOkLevel' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementCreateLogOkLevelNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogOkLevel' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogOkLevelNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogNamespaceCollectionOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogNamespaceCollectionOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogNamespaceCollectionOkItemsItem' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogNamespaceCollectionOkItemsItemNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryCollectionOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogEntryCollectionOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryCollectionOkItemsItem' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogEntryCollectionOkItemsItemNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementCreateLogEntryOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementCreateLogEntryOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogEntryOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryTagCollectionOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogEntryTagCollectionOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryTagCollectionOkItemsItem' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogEntryTagCollectionOkItemsItemNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntrySourceCollectionOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogEntrySourceCollectionOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntrySourceCollectionOkItemsItem' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogEntrySourceCollectionOkItemsItemNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryFrequencyCountCollectionOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogEntryFrequencyCountCollectionOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryFrequencyCountCollectionOkItemsItem' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogEntryFrequencyCountCollectionOkItemsItemNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntrySourceFrequencyCollectionOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogEntrySourceFrequencyCollectionOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntrySourceFrequencyCollectionOkItemsItem' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogEntrySourceFrequencyCollectionOkItemsItemNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryTagDistributionCollectionOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogEntryTagDistributionCollectionOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryTagDistributionCollectionOkItemsItem' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogEntryTagDistributionCollectionOkItemsItemNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogFrequencyCountCollectionOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogFrequencyCountCollectionOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogFrequencyCountCollectionOkItemsItem' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogFrequencyCountCollectionOkItemsItemNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogLevelStatisticsCollectionOk' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogLevelStatisticsCollectionOkNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogLevelStatisticsCollectionOkItemsItem' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogLevelStatisticsCollectionOkItemsItemNormalizer', 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogLevelStatisticsCollectionOkItemsItemLevel' => 'Carthage\\Sdk\\Normalizer\\ResponseLogManagementGetLogLevelStatisticsCollectionOkItemsItemLevelNormalizer', 'Carthage\\Sdk\\Model\\PingGetResponse200' => 'Carthage\\Sdk\\Normalizer\\PingGetResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementCollectPostBody' => 'Carthage\\Sdk\\Normalizer\\LogManagementCollectPostBodyNormalizer', 'Carthage\\Sdk\\Model\\LogManagementCollectPostBodyCollectLogsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementCollectPostBodyCollectLogsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementCollectPostBodyCollectLogsItemLog' => 'Carthage\\Sdk\\Normalizer\\LogManagementCollectPostBodyCollectLogsItemLogNormalizer', 'Carthage\\Sdk\\Model\\LogManagementCollectPostBodyCollectLogsItemEntriesItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementCollectPostBodyCollectLogsItemEntriesItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogGetResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogGetResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogGetResponse200ItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogGetResponse200ItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogGetResponse200ItemsItemLevel' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogGetResponse200ItemsItemLevelNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogPostBody' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogPostBodyNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogPostResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogPostResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogPostResponse200Level' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogPostResponse200LevelNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogIdentityGetResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogIdentityGetResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogIdentityGetResponse200Level' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogIdentityGetResponse200LevelNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogNamespaceGetResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogNamespaceGetResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogNamespaceGetResponse200ItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogNamespaceGetResponse200ItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogEntryGetResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogEntryGetResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogEntryGetResponse200ItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogEntryGetResponse200ItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogEntryPostBody' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogEntryPostBodyNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogEntryPostResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogEntryPostResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogEntryIdentityGetResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogEntryIdentityGetResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogEntryTagGetResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogEntryTagGetResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogEntryTagGetResponse200ItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogEntryTagGetResponse200ItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogEntrySourceGetResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogEntrySourceGetResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogEntrySourceGetResponse200ItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogEntrySourceGetResponse200ItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogCollectPostBody' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogCollectPostBodyNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogCollectPostBodyLog' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogCollectPostBodyLogNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogCollectPostBodyEntriesItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogCollectPostBodyEntriesItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntryFrequencyCountFrequencyGetResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticEntryFrequencyCountFrequencyGetResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntryFrequencyCountFrequencyGetResponse200ItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticEntryFrequencyCountFrequencyGetResponse200ItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntrySourceFrequencyGetResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticEntrySourceFrequencyGetResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntrySourceFrequencyGetResponse200ItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticEntrySourceFrequencyGetResponse200ItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntryTagDistributionGetResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticEntryTagDistributionGetResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntryTagDistributionGetResponse200ItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticEntryTagDistributionGetResponse200ItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticFrequencyCountFrequencyGetResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticFrequencyCountFrequencyGetResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticFrequencyCountFrequencyGetResponse200ItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticFrequencyCountFrequencyGetResponse200ItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticLevelStatisticsGetResponse200' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticLevelStatisticsGetResponse200Normalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticLevelStatisticsGetResponse200ItemsItem' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticLevelStatisticsGetResponse200ItemsItemNormalizer', 'Carthage\\Sdk\\Model\\LogManagementLogStatisticLevelStatisticsGetResponse200ItemsItemLevel' => 'Carthage\\Sdk\\Normalizer\\LogManagementLogStatisticLevelStatisticsGetResponse200ItemsItemLevelNormalizer', '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => '\\Carthage\\Sdk\\Runtime\\Normalizer\\ReferenceNormalizer'];
    protected $normalizersCache = [];

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return array_key_exists($type, $this->normalizers);
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && array_key_exists($data::class, $this->normalizers);
    }

    /**
     * @return array|string|int|float|bool|ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $normalizerClass = $this->normalizers[$object::class];
        $normalizer = $this->getNormalizer($normalizerClass);

        return $normalizer->normalize($object, $format, $context);
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer = $this->getNormalizer($denormalizerClass);

        return $denormalizer->denormalize($data, $class, $format, $context);
    }

    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }

    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;

        return $normalizer;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return ['Carthage\\Sdk\\Model\\SharedPingResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogCreateLog' => false, 'Carthage\\Sdk\\Model\\LogManagementLogCollectLogEntry' => false, 'Carthage\\Sdk\\Model\\LogManagementLogCollectLog' => false, 'Carthage\\Sdk\\Model\\LogManagementLogCollectLogLog' => false, 'Carthage\\Sdk\\Model\\LogManagementLogCollectLogEntriesItem' => false, 'Carthage\\Sdk\\Model\\LogManagementCollect' => false, 'Carthage\\Sdk\\Model\\LogManagementCollectCollectLogsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementCollectCollectLogsItemLog' => false, 'Carthage\\Sdk\\Model\\LogManagementCollectCollectLogsItemEntriesItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogResourceLevel' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogResourcePaginatedCollectionResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogResourcePaginatedCollectionResourceItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogResourcePaginatedCollectionResourceItemsItemLevel' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogNamespaceResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogNamespaceResourceCollectionResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogNamespaceResourceCollectionResourceItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryResourcePaginatedCollectionResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryResourcePaginatedCollectionResourceItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogCreateLogEntry' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryTagResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryTagResourceCollectionResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogEntryTagResourceCollectionResourceItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogEntrySourceResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogEntrySourceResourceCollectionResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogLogEntrySourceResourceCollectionResourceItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntryFrequencyCountResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntryFrequencyCountResourceCollectionResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntryFrequencyCountResourceCollectionResourceItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntrySourceFrequencyResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntrySourceFrequencyResourceCollectionResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntrySourceFrequencyResourceCollectionResourceItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntryTagDistributionResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntryTagDistributionResourceCollectionResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogEntryTagDistributionResourceCollectionResourceItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogFrequencyCountResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogFrequencyCountResourceCollectionResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogFrequencyCountResourceCollectionResourceItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogLevelStatisticsResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogLevelStatisticsResourceLevel' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogLevelStatisticsResourceCollectionResource' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogLevelStatisticsResourceCollectionResourceItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticsLogLevelStatisticsResourceCollectionResourceItemsItemLevel' => false, 'Carthage\\Sdk\\Model\\ResponsePingOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogCollectionOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogCollectionOkItemsItem' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogCollectionOkItemsItemLevel' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementCreateLogOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementCreateLogOkLevel' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogOkLevel' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogNamespaceCollectionOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogNamespaceCollectionOkItemsItem' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryCollectionOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryCollectionOkItemsItem' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementCreateLogEntryOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryTagCollectionOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryTagCollectionOkItemsItem' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntrySourceCollectionOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntrySourceCollectionOkItemsItem' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryFrequencyCountCollectionOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryFrequencyCountCollectionOkItemsItem' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntrySourceFrequencyCollectionOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntrySourceFrequencyCollectionOkItemsItem' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryTagDistributionCollectionOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogEntryTagDistributionCollectionOkItemsItem' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogFrequencyCountCollectionOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogFrequencyCountCollectionOkItemsItem' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogLevelStatisticsCollectionOk' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogLevelStatisticsCollectionOkItemsItem' => false, 'Carthage\\Sdk\\Model\\ResponseLogManagementGetLogLevelStatisticsCollectionOkItemsItemLevel' => false, 'Carthage\\Sdk\\Model\\PingGetResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementCollectPostBody' => false, 'Carthage\\Sdk\\Model\\LogManagementCollectPostBodyCollectLogsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementCollectPostBodyCollectLogsItemLog' => false, 'Carthage\\Sdk\\Model\\LogManagementCollectPostBodyCollectLogsItemEntriesItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogGetResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogGetResponse200ItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogGetResponse200ItemsItemLevel' => false, 'Carthage\\Sdk\\Model\\LogManagementLogPostBody' => false, 'Carthage\\Sdk\\Model\\LogManagementLogPostResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogPostResponse200Level' => false, 'Carthage\\Sdk\\Model\\LogManagementLogIdentityGetResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogIdentityGetResponse200Level' => false, 'Carthage\\Sdk\\Model\\LogManagementLogNamespaceGetResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogNamespaceGetResponse200ItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogEntryGetResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogEntryGetResponse200ItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogEntryPostBody' => false, 'Carthage\\Sdk\\Model\\LogManagementLogEntryPostResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogEntryIdentityGetResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogEntryTagGetResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogEntryTagGetResponse200ItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogEntrySourceGetResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogEntrySourceGetResponse200ItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogCollectPostBody' => false, 'Carthage\\Sdk\\Model\\LogManagementLogCollectPostBodyLog' => false, 'Carthage\\Sdk\\Model\\LogManagementLogCollectPostBodyEntriesItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntryFrequencyCountFrequencyGetResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntryFrequencyCountFrequencyGetResponse200ItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntrySourceFrequencyGetResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntrySourceFrequencyGetResponse200ItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntryTagDistributionGetResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticEntryTagDistributionGetResponse200ItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticFrequencyCountFrequencyGetResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticFrequencyCountFrequencyGetResponse200ItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticLevelStatisticsGetResponse200' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticLevelStatisticsGetResponse200ItemsItem' => false, 'Carthage\\Sdk\\Model\\LogManagementLogStatisticLevelStatisticsGetResponse200ItemsItemLevel' => false, '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => false];
    }
}
