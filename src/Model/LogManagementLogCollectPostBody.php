<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class LogManagementLogCollectPostBody extends ArrayObject
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
     * @var LogManagementLogCollectPostBodyLog
     */
    protected $log;
    /**
     * @var LogManagementLogCollectPostBodyEntriesItem[]
     */
    protected $entries;

    public function getLog(): LogManagementLogCollectPostBodyLog
    {
        return $this->log;
    }

    public function setLog(LogManagementLogCollectPostBodyLog $log): self
    {
        $this->initialized['log'] = true;
        $this->log = $log;

        return $this;
    }

    /**
     * @return LogManagementLogCollectPostBodyEntriesItem[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param LogManagementLogCollectPostBodyEntriesItem[] $entries
     */
    public function setEntries(array $entries): self
    {
        $this->initialized['entries'] = true;
        $this->entries = $entries;

        return $this;
    }
}
