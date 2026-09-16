<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
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

        #[MapInputName('Display')]
        public ?DisplayData $display = null,

        #[MapInputName('Usage')]
        public ?AssetUsageData $usage = null,

        #[MapInputName('Source')]
        public ?SourceData $source = null,

        #[MapInputName('Aliases')]
        public array $aliases = [],
    ) {}
}