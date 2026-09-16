<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class AssetData extends Data
{
    public function __construct(
        #[MapInputName('Source')]
        public SourceData $source,

        #[MapInputName('$id')]
        public string $id,

        #[MapInputName('Name')]
        public string $name,

        #[MapInputName('Asset Type')]
        public string $assetType,

        #[MapInputName('Display')]
        public DisplayData $display,

        #[MapInputName('Usage')]
        public AssetUsageData $usage,

        // #[MapInputName('Attachments')]
        // public AssetAttachmentData|Optional $attachments,

        // #[MapInputName('Inputs')]
        // #[DataCollectionOf(AssetInputData::class)]
        // public DataCollection|Optional $inputs,

        // /** @var AbilityData[] */
        // #[MapInputName('Abilities')]
        // #[DataCollectionOf(AbilityData::class)]
        // public DataCollection $abilities,

        // #[MapInputName('Condition Meter')]
        // public ?ConditionMeterData $conditionMeter = null,

        // /** @var AssetStateData[] */
        // #[MapInputName('States')]
        // #[DataCollectionOf(AssetStateData::class)]
        // public DataCollection|Optional $states = new Optional,

        // #[MapInputName('Requirement')]
        // public ?string $requirement = null,

        // #[MapInputName('Tags')]
        // public array $tags = [],

        // #[MapInputName('Aliases')]
        // public array $aliases = [],
    ) {}
}