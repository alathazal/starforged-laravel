<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Alathazal\StarforgedLaravel\Shared\Data\TextData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class AlterMomentumBurnData extends Data
{
    public function __construct(
        #[MapInputName('Trigger')]
        public TextData $trigger,

        #[MapInputName('Effect')]
        public TextData $effect,

        #[MapInputName('Outcomes')]
        public array $outcomes = [],
    ) {}
}
