<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;
use DateTime;

use function array_key_exists;

class LogManagementLogStatisticsLogEntryFrequencyCountResource extends ArrayObject
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
     * Date associated with the frequency count.
     *
     * @var DateTime
     */
    protected $date;
    /**
     * Count of log entries for the specified date.
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
     * Date associated with the frequency count.
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * Date associated with the frequency count.
     */
    public function setDate(DateTime $date): self
    {
        $this->initialized['date'] = true;
        $this->date = $date;

        return $this;
    }

    /**
     * Count of log entries for the specified date.
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * Count of log entries for the specified date.
     */
    public function setCount(int $count): self
    {
        $this->initialized['count'] = true;
        $this->count = $count;

        return $this;
    }
}
