<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class LogManagementCollectPostBodyCollectLogsItemLog extends ArrayObject
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
     * The namespace associated with the log.
     *
     * @var string
     */
    protected $namespace;
    /**
     * The severity level of the log.
     *
     * @var int
     */
    protected $level;
    /**
     * The template used for formatting the log message.
     *
     * @var string
     */
    protected $template;

    /**
     * The namespace associated with the log.
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * The namespace associated with the log.
     */
    public function setNamespace(string $namespace): self
    {
        $this->initialized['namespace'] = true;
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * The severity level of the log.
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * The severity level of the log.
     */
    public function setLevel(int $level): self
    {
        $this->initialized['level'] = true;
        $this->level = $level;

        return $this;
    }

    /**
     * The template used for formatting the log message.
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * The template used for formatting the log message.
     */
    public function setTemplate(string $template): self
    {
        $this->initialized['template'] = true;
        $this->template = $template;

        return $this;
    }
}
