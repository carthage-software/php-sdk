<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class LogManagementCollectPostBodyCollectLogsItem extends ArrayObject
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
     * @var LogManagementCollectPostBodyCollectLogsItemLog
     */
    protected $log;
    /**
     * @var LogManagementCollectPostBodyCollectLogsItemEntriesItem[]
     */
    protected $entries;

    public function getLog(): LogManagementCollectPostBodyCollectLogsItemLog
    {
        return $this->log;
    }

    public function setLog(LogManagementCollectPostBodyCollectLogsItemLog $log): self
    {
        $this->initialized['log'] = true;
        $this->log = $log;

        return $this;
    }

    /**
     * @return LogManagementCollectPostBodyCollectLogsItemEntriesItem[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param LogManagementCollectPostBodyCollectLogsItemEntriesItem[] $entries
     */
    public function setEntries(array $entries): self
    {
        $this->initialized['entries'] = true;
        $this->entries = $entries;

        return $this;
    }
}
