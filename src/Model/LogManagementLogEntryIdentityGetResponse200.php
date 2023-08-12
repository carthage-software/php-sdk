<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;
use DateTime;

use function array_key_exists;

class LogManagementLogEntryIdentityGetResponse200 extends ArrayObject
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
     * Unique identity of the log entry.
     *
     * @var string
     */
    protected $identity;
    /**
     * Identity of the associated log.
     *
     * @var string
     */
    protected $logIdentity;
    /**
     * Source of the log entry.
     *
     * @var string
     */
    protected $source;
    /**
     * Contextual information for the log entry.
     *
     * @var array<string, mixed>
     */
    protected $context;
    /**
     * Attributes associated with the log entry.
     *
     * @var array<string, mixed>
     */
    protected $attributes;
    /**
     * Tags associated with the log entry.
     *
     * @var string[]
     */
    protected $tags;
    /**
     * Timestamp when the log entry occurred.
     *
     * @var DateTime
     */
    protected $occurredAt;
    /**
     * Timestamp when the log entry was created.
     *
     * @var DateTime
     */
    protected $createdAt;
    /**
     * Timestamp when the log entry was last updated.
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
     * Unique identity of the log entry.
     */
    public function getIdentity(): string
    {
        return $this->identity;
    }

    /**
     * Unique identity of the log entry.
     */
    public function setIdentity(string $identity): self
    {
        $this->initialized['identity'] = true;
        $this->identity = $identity;

        return $this;
    }

    /**
     * Identity of the associated log.
     */
    public function getLogIdentity(): string
    {
        return $this->logIdentity;
    }

    /**
     * Identity of the associated log.
     */
    public function setLogIdentity(string $logIdentity): self
    {
        $this->initialized['logIdentity'] = true;
        $this->logIdentity = $logIdentity;

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

    /**
     * Contextual information for the log entry.
     *
     * @return array<string, mixed>
     */
    public function getContext(): iterable
    {
        return $this->context;
    }

    /**
     * Contextual information for the log entry.
     *
     * @param array<string, mixed> $context
     */
    public function setContext(iterable $context): self
    {
        $this->initialized['context'] = true;
        $this->context = $context;

        return $this;
    }

    /**
     * Attributes associated with the log entry.
     *
     * @return array<string, mixed>
     */
    public function getAttributes(): iterable
    {
        return $this->attributes;
    }

    /**
     * Attributes associated with the log entry.
     *
     * @param array<string, mixed> $attributes
     */
    public function setAttributes(iterable $attributes): self
    {
        $this->initialized['attributes'] = true;
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Tags associated with the log entry.
     *
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * Tags associated with the log entry.
     *
     * @param string[] $tags
     */
    public function setTags(array $tags): self
    {
        $this->initialized['tags'] = true;
        $this->tags = $tags;

        return $this;
    }

    /**
     * Timestamp when the log entry occurred.
     */
    public function getOccurredAt(): DateTime
    {
        return $this->occurredAt;
    }

    /**
     * Timestamp when the log entry occurred.
     */
    public function setOccurredAt(DateTime $occurredAt): self
    {
        $this->initialized['occurredAt'] = true;
        $this->occurredAt = $occurredAt;

        return $this;
    }

    /**
     * Timestamp when the log entry was created.
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Timestamp when the log entry was created.
     */
    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Timestamp when the log entry was last updated.
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Timestamp when the log entry was last updated.
     */
    public function setUpdatedAt(DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
