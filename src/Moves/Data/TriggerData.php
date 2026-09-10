<?php

namespace Alathazal\DataforgedLaravel\Moves\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class TriggerData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public ?string $id,

        public string $text,

        /** @var TriggerOptionData[] */
        public array $options = [],
    ) {}
}