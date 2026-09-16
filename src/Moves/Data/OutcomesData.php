<?php

namespace Alathazal\StarforgedLaravel\Moves\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class OutcomesData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public ?string $id = null,

        #[MapInputName('Strong Hit')]
        public ?OutcomeData $strongHit = null,

        #[MapInputName('Weak Hit')]
        public ?OutcomeData $weakHit = null,

        #[MapInputName('Miss')]
        public ?OutcomeData $miss = null,
    ) {}
}