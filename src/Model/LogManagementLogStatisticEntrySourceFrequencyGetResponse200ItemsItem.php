<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class LogManagementLogStatisticEntrySourceFrequencyGetResponse200ItemsItem extends ArrayObject
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
     * Type identifier for the resource.
     *
     * @var string
     */
    protected $type;
    /**
     * Source associated with the frequency count.
     *
     * @var string
     */
    protected $source;
    /**
     * Count of log entries for the specified source.
     *
     * @var int
     */
    protected $count;
    /**
     * Percentage of log entries for the specified source.
     *
     * @var float
     */
    protected $percentage;

    /**
     * Type identifier for the resource.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Type identifier for the resource.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Source associated with the frequency count.
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * Source associated with the frequency count.
     */
    public function setSource(string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;

        return $this;
    }

    /**
     * Count of log entries for the specified source.
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * Count of log entries for the specified source.
     */
    public function setCount(int $count): self
    {
        $this->initialized['count'] = true;
        $this->count = $count;

        return $this;
    }

    /**
     * Percentage of log entries for the specified source.
     */
    public function getPercentage(): float
    {
        return $this->percentage;
    }

    /**
     * Percentage of log entries for the specified source.
     */
    public function setPercentage(float $percentage): self
    {
        $this->initialized['percentage'] = true;
        $this->percentage = $percentage;

        return $this;
    }
}
