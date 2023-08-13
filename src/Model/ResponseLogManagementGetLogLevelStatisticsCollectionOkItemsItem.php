<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class ResponseLogManagementGetLogLevelStatisticsCollectionOkItemsItem extends ArrayObject
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
     * Level associated with the statistics.
     *
     * @var ResponseLogManagementGetLogLevelStatisticsCollectionOkItemsItemLevel
     */
    protected $level;
    /**
     * Count of logs for the specified level.
     *
     * @var int
     */
    protected $count;
    /**
     * Percentage of logs for the specified level.
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
     * Level associated with the statistics.
     */
    public function getLevel(): ResponseLogManagementGetLogLevelStatisticsCollectionOkItemsItemLevel
    {
        return $this->level;
    }

    /**
     * Level associated with the statistics.
     */
    public function setLevel(ResponseLogManagementGetLogLevelStatisticsCollectionOkItemsItemLevel $level): self
    {
        $this->initialized['level'] = true;
        $this->level = $level;

        return $this;
    }

    /**
     * Count of logs for the specified level.
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * Count of logs for the specified level.
     */
    public function setCount(int $count): self
    {
        $this->initialized['count'] = true;
        $this->count = $count;

        return $this;
    }

    /**
     * Percentage of logs for the specified level.
     */
    public function getPercentage(): float
    {
        return $this->percentage;
    }

    /**
     * Percentage of logs for the specified level.
     */
    public function setPercentage(float $percentage): self
    {
        $this->initialized['percentage'] = true;
        $this->percentage = $percentage;

        return $this;
    }
}
