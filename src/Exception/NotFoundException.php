<?php

declare(strict_types=1);

namespace Carthage\Sdk\Exception;

use RuntimeException;

class NotFoundException extends RuntimeException implements ClientException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 404);
    }
}
