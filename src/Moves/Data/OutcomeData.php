<?php

namespace Alathazal\DataforgedLaravel\Moves\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class OutcomeData extends Data
{
    public function __construct(
        public string $text,
    ) {}
}