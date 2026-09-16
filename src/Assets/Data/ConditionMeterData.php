<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ConditionMeterData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string|Optional $id,

        #[MapInputName('Name')]
        public string|Optional $name,

        #[MapInputName('Min')]
        public int|Optional $min,

        #[MapInputName('Max')]
        public int $max,

        #[MapInputName('Value')]
        public int|Optional $value,

        #[MapInputName('Conditions')]
        public array $conditions = [],
        
        #[MapInputName('Aliases')]
        public array $aliases = [],
    ) {}
}