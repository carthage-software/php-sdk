<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;
use DateTime;

use function array_key_exists;

class ResponseLogManagementGetLogOk extends ArrayObject
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
     * Unique identity of the log.
     *
     * @var string
     */
    protected $identity;
    /**
     * The namespace of the log.
     *
     * @var string
     */
    protected $namespace;
    /**
     * The log level.
     *
     * @var ResponseLogManagementGetLogOkLevel
     */
    protected $level;
    /**
     * The template for formatting the message.
     *
     * @var string
     */
    protected $template;
    /**
     * Timestamp of the first entry occurrence, if available.
     *
     * @var DateTime|null
     */
    protected $firstEntryOccurredAt;
    /**
     * Timestamp of the last entry occurrence, if available.
     *
     * @var DateTime|null
     */
    protected $lastEntryOccurredAt;
    /**
     * Timestamp when the log was created.
     *
     * @var DateTime
     */
    protected $createdAt;
    /**
     * Timestamp when the log was last updated.
     *
     * @var DateTime
     */
    protected $updatedAt;

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
     * Unique identity of the log.
     */
    public function getIdentity(): string
    {
        return $this->identity;
    }

    /**
     * Unique identity of the log.
     */
    public function setIdentity(string $identity): self
    {
        $this->initialized['identity'] = true;
        $this->identity = $identity;

        return $this;
    }

    /**
     * The namespace of the log.
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * The namespace of the log.
     */
    public function setNamespace(string $namespace): self
    {
        $this->initialized['namespace'] = true;
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * The log level.
     */
    public function getLevel(): ResponseLogManagementGetLogOkLevel
    {
        return $this->level;
    }

    /**
     * The log level.
     */
    public function setLevel(ResponseLogManagementGetLogOkLevel $level): self
    {
        $this->initialized['level'] = true;
        $this->level = $level;

        return $this;
    }

    /**
     * The template for formatting the message.
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * The template for formatting the message.
     */
    public function setTemplate(string $template): self
    {
        $this->initialized['template'] = true;
        $this->template = $template;

        return $this;
    }

    /**
     * Timestamp of the first entry occurrence, if available.
     */
    public function getFirstEntryOccurredAt(): ?DateTime
    {
        return $this->firstEntryOccurredAt;
    }

    /**
     * Timestamp of the first entry occurrence, if available.
     */
    public function setFirstEntryOccurredAt(?DateTime $firstEntryOccurredAt): self
    {
        $this->initialized['firstEntryOccurredAt'] = true;
        $this->firstEntryOccurredAt = $firstEntryOccurredAt;

        return $this;
    }

    /**
     * Timestamp of the last entry occurrence, if available.
     */
    public function getLastEntryOccurredAt(): ?DateTime
    {
        return $this->lastEntryOccurredAt;
    }

    /**
     * Timestamp of the last entry occurrence, if available.
     */
    public function setLastEntryOccurredAt(?DateTime $lastEntryOccurredAt): self
    {
        $this->initialized['lastEntryOccurredAt'] = true;
        $this->lastEntryOccurredAt = $lastEntryOccurredAt;

        return $this;
    }

    /**
     * Timestamp when the log was created.
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Timestamp when the log was created.
     */
    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Timestamp when the log was last updated.
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Timestamp when the log was last updated.
     */
    public function setUpdatedAt(DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
