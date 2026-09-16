<?php

namespace Alathazal\StarforgedLaravel\Moves\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class CustomStatData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        #[MapInputName('Name')]
        public string $name,

        /** @var CustomStatOptionData[] */
        #[MapInputName('Options')]
        #[DataCollectionOf(CustomStatOptionData::class)]
        public DataCollection $options,
    ) {}
}
