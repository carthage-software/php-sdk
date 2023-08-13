<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class ResponseLogManagementGetLogOkLevel extends ArrayObject
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
     * Name of the log level.
     *
     * @var string
     */
    protected $name;
    /**
     * Value of the log level.
     *
     * @var int
     */
    protected $value;

    /**
     * Name of the log level.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the log level.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Value of the log level.
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Value of the log level.
     */
    public function setValue(int $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }
}
