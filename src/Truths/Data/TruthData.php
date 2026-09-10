<?php

namespace Alathazal\DataforgedLaravel\Truths\Data;

use Alathazal\DataforgedLaravel\Shared\Data\DisplayData;
use Alathazal\DataforgedLaravel\Shared\Data\SourceData;
use Alathazal\DataforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

final class TruthData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        #[MapInputName('Name')]
        public string $name,

        #[MapInputName('Table')]
        #[DataCollectionOf(TruthTableEntryData::class)]
        public DataCollection $table,

        #[MapInputName('Character')]
        public string|Optional $character,

        #[MapInputName('Suggestions')]
        public SuggestionsData|Optional $suggestions,

        #[MapInputName('Display')]
        public DisplayData|Optional $display,

        #[MapInputName('Source')]
        public SourceData|Optional $source,
    ) {}
}