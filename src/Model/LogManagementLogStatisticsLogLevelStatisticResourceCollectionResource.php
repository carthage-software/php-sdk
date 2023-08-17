<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;
use DateTime;

use function array_key_exists;

class LogManagementLogStatisticsLogLevelStatisticResourceCollectionResource extends ArrayObject
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
     * Start date for the collection.
     *
     * @var DateTime
     */
    protected $from;
    /**
     * End date for the collection.
     *
     * @var DateTime
     */
    protected $to;
    /**
     * Array of LogLevelStatisticResource.
     *
     * @var LogManagementLogStatisticsLogLevelStatisticResourceCollectionResourceItemsItem[]
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
     * Start date for the collection.
     */
    public function getFrom(): DateTime
    {
        return $this->from;
    }

    /**
     * Start date for the collection.
     */
    public function setFrom(DateTime $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;

        return $this;
    }

    /**
     * End date for the collection.
     */
    public function getTo(): DateTime
    {
        return $this->to;
    }

    /**
     * End date for the collection.
     */
    public function setTo(DateTime $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;

        return $this;
    }

    /**
     * Array of LogLevelStatisticResource.
     *
     * @return LogManagementLogStatisticsLogLevelStatisticResourceCollectionResourceItemsItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Array of LogLevelStatisticResource.
     *
     * @param LogManagementLogStatisticsLogLevelStatisticResourceCollectionResourceItemsItem[] $items
     */
    public function setItems(array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;

        return $this;
    }
}
