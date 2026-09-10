<?php

namespace Alathazal\DataforgedLaravel\Assets\Data;

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

        #[MapInputName('Alter Moves')]
        #[DataCollectionOf(AlterMoveData::class)]
        public DataCollection|Optional $alterMoves,

        #[MapInputName('Enabled')]
        public bool $enabled,
    ) {}
}