<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

/**
 * Describes changes an asset ability makes to its parent asset when active.
 * All properties are optional since only changed properties are specified.
 */
class AssetAlterPropertiesData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public ?string $id = null,

        #[MapInputName('Name')]
        public ?string $name = null,

        #[MapInputName('Display')]
        public ?DisplayData $display = null,

        /** @var AssetStateData[] */
        #[MapInputName('States')]
        #[DataCollectionOf(AssetStateData::class)]
        public DataCollection|Optional $states = new Optional,

        #[MapInputName('Asset Type')]
        public ?string $assetType = null,

        #[MapInputName('Usage')]
        public AssetUsageData|Optional $usage = new Optional,

        #[MapInputName('Attachments')]
        public AssetAttachmentData|Optional $attachments = new Optional,

        /** @var AssetInputData[] */
        #[MapInputName('Inputs')]
        #[DataCollectionOf(AssetInputData::class)]
        public DataCollection|Optional $inputs = new Optional,

        #[MapInputName('Requirement')]
        public ?string $requirement = null,

        /** @var AbilityData[] */
        #[MapInputName('Abilities')]
        #[DataCollectionOf(AbilityData::class)]
        public DataCollection|Optional $abilities = new Optional,

        #[MapInputName('Condition Meter')]
        public ?ConditionMeterData $conditionMeter = null,

        #[MapInputName('Tags')]
        public array $tags = [],

        #[MapInputName('Source')]
        public ?SourceData $source = null,

        #[MapInputName('Aliases')]
        public array $aliases = [],
    ) {}
}
