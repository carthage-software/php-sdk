<?php

declare(strict_types=1);

namespace Carthage\Sdk\Runtime\Normalizer;

use function count;

use const ARRAY_FILTER_USE_KEY;

trait CheckArray
{
    public function isOnlyNumericKeys(array $array): bool
    {
        return count(array_filter($array, static function ($key) {
            return is_numeric($key);
        }, ARRAY_FILTER_USE_KEY)) === count($array);
    }
}
