<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class LogManagementLogCollectLog extends ArrayObject
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
     * @var LogManagementLogCollectLogLog
     */
    protected $log;
    /**
     * @var LogManagementLogCollectLogEntriesItem[]
     */
    protected $entries;

    public function getLog(): LogManagementLogCollectLogLog
    {
        return $this->log;
    }

    public function setLog(LogManagementLogCollectLogLog $log): self
    {
        $this->initialized['log'] = true;
        $this->log = $log;

        return $this;
    }

    /**
     * @return LogManagementLogCollectLogEntriesItem[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param LogManagementLogCollectLogEntriesItem[] $entries
     */
    public function setEntries(array $entries): self
    {
        $this->initialized['entries'] = true;
        $this->entries = $entries;

        return $this;
    }
}
