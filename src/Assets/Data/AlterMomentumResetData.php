<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Alathazal\StarforgedLaravel\Shared\Data\TextData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class AlterMomentumResetData extends Data
{
    public function __construct(
        #[MapInputName('Trigger')]
        public TextData $trigger,

        #[MapInputName('Value')]
        public int $value,
    ) {}
}
