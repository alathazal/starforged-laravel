<?php

namespace Alathazal\StarforgedLaravel\Truths\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Alathazal\StarforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\DataCollection;

final class TruthTableEntryData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        #[MapInputName('Floor')]
        public int $floor,

        #[MapInputName('Ceiling')]
        public int $ceiling,

        #[MapInputName('Result')]
        public string $result,

        #[MapInputName('Description')]
        public string $description,

        #[MapInputName('Quest Starter')]
        public string $questStarter,

        #[MapInputName('Subtable')]
        #[DataCollectionOf(TruthSubtableEntryData::class)]
        public DataCollection|Optional $subtable,
    ) {}
}