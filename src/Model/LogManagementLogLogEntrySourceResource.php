<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class LogManagementLogLogEntrySourceResource extends ArrayObject
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
     * Type of the resource.
     *
     * @var string
     */
    protected $type;
    /**
     * Source of the log entry.
     *
     * @var string
     */
    protected $source;

    /**
     * Type of the resource.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Type of the resource.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Source of the log entry.
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * Source of the log entry.
     */
    public function setSource(string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;

        return $this;
    }
}
