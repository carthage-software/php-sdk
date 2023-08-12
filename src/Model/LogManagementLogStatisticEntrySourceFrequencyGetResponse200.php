<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class LogManagementLogStatisticEntrySourceFrequencyGetResponse200 extends ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * Type identifier for the collection.
     *
     * @var string
     */
    protected $type;
    /**
     * Array of LogEntrySourceFrequencyResource.
     *
     * @var LogManagementLogStatisticEntrySourceFrequencyGetResponse200ItemsItem[]
     */
    protected $items;

    /**
     * Type identifier for the collection.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Type identifier for the collection.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Array of LogEntrySourceFrequencyResource.
     *
     * @return LogManagementLogStatisticEntrySourceFrequencyGetResponse200ItemsItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Array of LogEntrySourceFrequencyResource.
     *
     * @param LogManagementLogStatisticEntrySourceFrequencyGetResponse200ItemsItem[] $items
     */
    public function setItems(array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;

        return $this;
    }
}
