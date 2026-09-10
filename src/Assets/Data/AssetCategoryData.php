<?php

namespace Alathazal\DataforgedLaravel\Assets\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class AssetCategoryData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        #[MapInputName('Name')]
        public string $name,

        #[MapInputName('Description')]
        public string $description,

        #[MapInputName('Assets')]
        #[DataCollectionOf(AssetData::class)]
        public DataCollection $assets,
    ) {}
}