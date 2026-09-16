<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class AlterMoveOutcomesData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public ?string $id = null,

        #[MapInputName('Strong Hit')]
        public ?AlterOutcomeInfoData $strongHit = null,

        #[MapInputName('Weak Hit')]
        public ?AlterOutcomeInfoData $weakHit = null,

        #[MapInputName('Miss')]
        public ?AlterOutcomeInfoData $miss = null,
    ) {}
}
