<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class AlterMomentumData extends Data
{
    public function __construct(
        /** @var AlterMomentumBurnData[] */
        #[MapInputName('Burn')]
        #[DataCollectionOf(AlterMomentumBurnData::class)]
        public DataCollection|Optional $burn = new Optional,

        /** @var AlterMomentumResetData[] */
        #[MapInputName('Reset')]
        #[DataCollectionOf(AlterMomentumResetData::class)]
        public DataCollection|Optional $reset = new Optional,
    ) {}
}
