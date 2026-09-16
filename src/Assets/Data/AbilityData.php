<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Alathazal\StarforgedLaravel\Moves\Data\MoveData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class AbilityData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        #[MapInputName('Text')]
        public string $text,

        #[MapInputName('Enabled')]
        public bool $enabled,

        /** Ironsworn companion assets provide names for their abilities; Starforged abilities do not. */
        #[MapInputName('Name')]
        public ?string $name = null,

        #[MapInputName('Alter Moves')]
        #[DataCollectionOf(AlterMoveData::class)]
        public DataCollection|Optional $alterMoves = new Optional,

        /** New moves added by this asset ability. */
        #[MapInputName('Moves')]
        #[DataCollectionOf(MoveData::class)]
        public DataCollection|Optional $moves = new Optional,

        /** @var AssetInputData[] */
        #[MapInputName('Inputs')]
        #[DataCollectionOf(AssetInputData::class)]
        public DataCollection|Optional $inputs = new Optional,

        #[MapInputName('Alter Properties')]
        public AssetAlterPropertiesData|Optional $alterProperties = new Optional,

        #[MapInputName('Alter Momentum')]
        public AlterMomentumData|Optional $alterMomentum = new Optional,
    ) {}
}