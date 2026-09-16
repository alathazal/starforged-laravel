<?php

namespace Alathazal\StarforgedLaravel\AssetTypes\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class AssetTypeData extends Data
{
    public function __construct(
        #[MapInputName('Source')]
        public SourceData $source,

        #[MapInputName('$id')]
        public string $id,

        #[MapInputName('Name')]
        public string $name,

        #[MapInputName('Description')]
        public string $description,

        #[MapInputName('Display')]
        public DisplayData $display,

        #[MapInputName('Usage')]
        public AssetTypeUsageData $usage,
    ) {}
}