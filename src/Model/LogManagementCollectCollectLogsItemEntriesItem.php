<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;
use DateTime;

use function array_key_exists;

class LogManagementCollectCollectLogsItemEntriesItem extends ArrayObject
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
     * The source of the entry, indicating what part of the system the entry is from.
     *
     * @var string
     */
    protected $source;
    /**
     * The context of the entry, providing additional information to help understand the entry.
     *
     * @var array<string, mixed>
     */
    protected $context;
    /**
     * The attributes of the entry, providing additional information not included in the main message.
     *
     * @var array<string, mixed>
     */
    protected $attributes;
    /**
     * @var string[]
     */
    protected $tags;
    /**
     * The timestamp indicating when the entry occurred.
     *
     * @var DateTime
     */
    protected $occurredAt;

    /**
     * The source of the entry, indicating what part of the system the entry is from.
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * The source of the entry, indicating what part of the system the entry is from.
     */
    public function setSource(string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;

        return $this;
    }

    /**
     * The context of the entry, providing additional information to help understand the entry.
     *
     * @return array<string, mixed>
     */
    public function getContext(): iterable
    {
        return $this->context;
    }

    /**
     * The context of the entry, providing additional information to help understand the entry.
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
     * The attributes of the entry, providing additional information not included in the main message.
     *
     * @return array<string, mixed>
     */
    public function getAttributes(): iterable
    {
        return $this->attributes;
    }

    /**
     * The attributes of the entry, providing additional information not included in the main message.
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
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param string[] $tags
     */
    public function setTags(array $tags): self
    {
        $this->initialized['tags'] = true;
        $this->tags = $tags;

        return $this;
    }

    /**
     * The timestamp indicating when the entry occurred.
     */
    public function getOccurredAt(): DateTime
    {
        return $this->occurredAt;
    }

    /**
     * The timestamp indicating when the entry occurred.
     */
    public function setOccurredAt(DateTime $occurredAt): self
    {
        $this->initialized['occurredAt'] = true;
        $this->occurredAt = $occurredAt;

        return $this;
    }
}
