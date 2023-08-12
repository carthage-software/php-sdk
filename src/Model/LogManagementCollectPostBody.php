<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class LogManagementCollectPostBody extends ArrayObject
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
     * @var LogManagementCollectPostBodyCollectLogsItem[]
     */
    protected $collectLogs;

    /**
     * @return LogManagementCollectPostBodyCollectLogsItem[]
     */
    public function getCollectLogs(): array
    {
        return $this->collectLogs;
    }

    /**
     * @param LogManagementCollectPostBodyCollectLogsItem[] $collectLogs
     */
    public function setCollectLogs(array $collectLogs): self
    {
        $this->initialized['collectLogs'] = true;
        $this->collectLogs = $collectLogs;

        return $this;
    }
}
