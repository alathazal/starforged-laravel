<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

/**
 * Represents an asset input control. Covers all of Text, Number, Clock and
 * Select input types; fields not relevant to a given `inputType` are null.
 */
class AssetInputData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        #[MapInputName('Name')]
        public string $name,

        #[MapInputName('Input Type')]
        public string $inputType,

        #[MapInputName('Adjustable')]
        public bool $adjustable,

        // Number input
        #[MapInputName('Min')]
        public ?int $min = null,

        #[MapInputName('Max')]
        public ?int $max = null,

        #[MapInputName('Step')]
        public ?int $step = null,

        #[MapInputName('Value')]
        public ?int $value = null,

        // Clock input
        #[MapInputName('Clock Type')]
        public ?string $clockType = null,

        #[MapInputName('Segments')]
        public ?int $segments = null,

        #[MapInputName('Filled')]
        public ?int $filled = null,

        // Select input
        #[MapInputName('Sets')]
        public ?array $sets = null,

        #[MapInputName('Options')]
        public ?array $options = null,

        #[MapInputName('Key')]
        public ?string $key = null,

        #[MapInputName('Type')]
        public ?string $type = null,
    ) {}
}