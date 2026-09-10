<?php

namespace Alathazal\DataforgedLaravel\Moves\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class OutcomesData extends Data
{
    public function __construct(
        #[MapInputName('Strong Hit')]
        public ?OutcomeData $strongHit,

        #[MapInputName('Weak Hit')]
        public ?OutcomeData $weakHit,

        #[MapInputName('Miss')]
        public ?OutcomeData $miss,
    ) {}
}