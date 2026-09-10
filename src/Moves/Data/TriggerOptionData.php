<?php

namespace Alathazal\DataforgedLaravel\Moves\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class TriggerOptionData extends Data
{
    public function __construct(
        public ?string $text = null,

        #[MapInputName('Roll type')]
        public ?string $rollType = null,

        public ?string $method = null,

        #[MapInputName('Using')]
        public array $using = [],
    ) {}
}
