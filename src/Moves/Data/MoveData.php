<?php

namespace Alathazal\DataforgedLaravel\Moves\Data;

use Alathazal\DataforgedLaravel\Shared\Data\DisplayData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class MoveData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        public string $name,

        public string $category,

        public bool $optional = false,

        #[MapInputName('Progress Move')]
        public bool $progressMove = false,

        public ?DisplayData $display = null,

        public ?TriggerData $trigger = null,

        public ?OutcomesData $outcomes = null,

        public ?string $text = null,
    ) {}
}