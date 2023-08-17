<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class LogManagementLogStatisticEntryTagDistributionFromFromToToGetResponse200ItemsItem extends ArrayObject
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
     * Tag associated with the distribution.
     *
     * @var string
     */
    protected $tag;
    /**
     * Count of log entries for the specified tag.
     *
     * @var int
     */
    protected $count;

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
     * Tag associated with the distribution.
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * Tag associated with the distribution.
     */
    public function setTag(string $tag): self
    {
        $this->initialized['tag'] = true;
        $this->tag = $tag;

        return $this;
    }

    /**
     * Count of log entries for the specified tag.
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * Count of log entries for the specified tag.
     */
    public function setCount(int $count): self
    {
        $this->initialized['count'] = true;
        $this->count = $count;

        return $this;
    }
}
