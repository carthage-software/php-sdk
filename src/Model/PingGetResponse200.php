<?php

declare(strict_types=1);

namespace Carthage\Sdk\Model;

use ArrayObject;
use DateTime;

use function array_key_exists;

class PingGetResponse200 extends ArrayObject
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
     * A random quote from Hannibal, The Carthaginian General.
     *
     * @var string
     */
    protected $quote;
    /**
     * The date and time.
     *
     * @var DateTime
     */
    protected $time;

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
     * A random quote from Hannibal, The Carthaginian General.
     */
    public function getQuote(): string
    {
        return $this->quote;
    }

    /**
     * A random quote from Hannibal, The Carthaginian General.
     */
    public function setQuote(string $quote): self
    {
        $this->initialized['quote'] = true;
        $this->quote = $quote;

        return $this;
    }

    /**
     * The date and time.
     */
    public function getTime(): DateTime
    {
        return $this->time;
    }

    /**
     * The date and time.
     */
    public function setTime(DateTime $time): self
    {
        $this->initialized['time'] = true;
        $this->time = $time;

        return $this;
    }
}
