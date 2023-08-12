<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class LogManagementCollectCollectLogsItem extends ArrayObject
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
     * @var LogManagementCollectCollectLogsItemLog
     */
    protected $log;
    /**
     * @var LogManagementCollectCollectLogsItemEntriesItem[]
     */
    protected $entries;

    public function getLog(): LogManagementCollectCollectLogsItemLog
    {
        return $this->log;
    }

    public function setLog(LogManagementCollectCollectLogsItemLog $log): self
    {
        $this->initialized['log'] = true;
        $this->log = $log;

        return $this;
    }

    /**
     * @return LogManagementCollectCollectLogsItemEntriesItem[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param LogManagementCollectCollectLogsItemEntriesItem[] $entries
     */
    public function setEntries(array $entries): self
    {
        $this->initialized['entries'] = true;
        $this->entries = $entries;

        return $this;
    }
}
