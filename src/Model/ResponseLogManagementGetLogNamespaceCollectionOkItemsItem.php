<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class ResponseLogManagementGetLogNamespaceCollectionOkItemsItem extends ArrayObject
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
     * Namespace of the log.
     *
     * @var string
     */
    protected $namespace;

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
     * Namespace of the log.
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * Namespace of the log.
     */
    public function setNamespace(string $namespace): self
    {
        $this->initialized['namespace'] = true;
        $this->namespace = $namespace;

        return $this;
    }
}
