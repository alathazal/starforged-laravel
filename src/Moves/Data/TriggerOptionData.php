<?php

namespace Alathazal\StarforgedLaravel\Moves\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TriggerOptionData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public ?string $id = null,

        public ?string $text = null,

        #[MapInputName('Roll type')]
        public ?string $rollType = null,

        public ?string $method = null,

        #[MapInputName('Using')]
        public array $using = [],

        #[MapInputName('Custom stat')]
        public CustomStatData|Optional $customStat = new Optional,
    ) {}
}
