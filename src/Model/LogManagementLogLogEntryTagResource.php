<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class LogManagementLogLogEntryTagResource extends ArrayObject
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
     * Tag of the log entry.
     *
     * @var string
     */
    protected $tag;

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
     * Tag of the log entry.
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * Tag of the log entry.
     */
    public function setTag(string $tag): self
    {
        $this->initialized['tag'] = true;
        $this->tag = $tag;

        return $this;
    }
}
