<?php

namespace Alathazal\DataforgedLaravel\Assets\Data;

use Alathazal\DataforgedLaravel\Shared\Data\DisplayData;
use Alathazal\DataforgedLaravel\Shared\Data\SourceData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class AssetAttachmentData extends Data
{
    public function __construct(
        #[MapInputName('Asset Types')]
        public array $assetTypes,

        #[MapInputName('Max')]
        public ?int $max
    ) {}
}