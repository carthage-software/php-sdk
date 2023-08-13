<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;

use function array_key_exists;

class ResponseLogManagementGetLogCollectionOk extends ArrayObject
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
     * Type identifier for the collection.
     *
     * @var string
     */
    protected $type;
    /**
     * Current page number.
     *
     * @var int
     */
    protected $page;
    /**
     * Number of items per page.
     *
     * @var int
     */
    protected $itemsPerPage;
    /**
     * Total number of items.
     *
     * @var int
     */
    protected $totalItems;
    /**
     * First item index.
     *
     * @var int
     */
    protected $first;
    /**
     * Last item index.
     *
     * @var int
     */
    protected $last;
    /**
     * Next page number, if available.
     *
     * @var int|null
     */
    protected $next;
    /**
     * Previous page number, if available.
     *
     * @var int|null
     */
    protected $previous;
    /**
     * Array of LogResource.
     *
     * @var ResponseLogManagementGetLogCollectionOkItemsItem[]
     */
    protected $items;

    /**
     * Type identifier for the collection.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Type identifier for the collection.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Current page number.
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * Current page number.
     */
    public function setPage(int $page): self
    {
        $this->initialized['page'] = true;
        $this->page = $page;

        return $this;
    }

    /**
     * Number of items per page.
     */
    public function getItemsPerPage(): int
    {
        return $this->itemsPerPage;
    }

    /**
     * Number of items per page.
     */
    public function setItemsPerPage(int $itemsPerPage): self
    {
        $this->initialized['itemsPerPage'] = true;
        $this->itemsPerPage = $itemsPerPage;

        return $this;
    }

    /**
     * Total number of items.
     */
    public function getTotalItems(): int
    {
        return $this->totalItems;
    }

    /**
     * Total number of items.
     */
    public function setTotalItems(int $totalItems): self
    {
        $this->initialized['totalItems'] = true;
        $this->totalItems = $totalItems;

        return $this;
    }

    /**
     * First item index.
     */
    public function getFirst(): int
    {
        return $this->first;
    }

    /**
     * First item index.
     */
    public function setFirst(int $first): self
    {
        $this->initialized['first'] = true;
        $this->first = $first;

        return $this;
    }

    /**
     * Last item index.
     */
    public function getLast(): int
    {
        return $this->last;
    }

    /**
     * Last item index.
     */
    public function setLast(int $last): self
    {
        $this->initialized['last'] = true;
        $this->last = $last;

        return $this;
    }

    /**
     * Next page number, if available.
     */
    public function getNext(): ?int
    {
        return $this->next;
    }

    /**
     * Next page number, if available.
     */
    public function setNext(?int $next): self
    {
        $this->initialized['next'] = true;
        $this->next = $next;

        return $this;
    }

    /**
     * Previous page number, if available.
     */
    public function getPrevious(): ?int
    {
        return $this->previous;
    }

    /**
     * Previous page number, if available.
     */
    public function setPrevious(?int $previous): self
    {
        $this->initialized['previous'] = true;
        $this->previous = $previous;

        return $this;
    }

    /**
     * Array of LogResource.
     *
     * @return ResponseLogManagementGetLogCollectionOkItemsItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Array of LogResource.
     *
     * @param ResponseLogManagementGetLogCollectionOkItemsItem[] $items
     */
    public function setItems(array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;

        return $this;
    }
}
