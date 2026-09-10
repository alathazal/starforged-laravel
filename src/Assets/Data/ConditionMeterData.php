<?php

namespace Alathazal\DataforgedLaravel\Assets\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class ConditionMeterData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        #[MapInputName('Name')]
        public string $name,

        #[MapInputName('Min')]
        public int $min,

        #[MapInputName('Max')]
        public int $max,

        #[MapInputName('Value')]
        public int $value,

        #[MapInputName('Conditions')]
        public array $conditions = [],
        
        #[MapInputName('Aliases')]
        public array $aliases = [],
    ) {}
}