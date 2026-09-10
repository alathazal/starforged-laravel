<?php

namespace Alathazal\DataforgedLaravel\Truths\Data;

use Alathazal\DataforgedLaravel\Shared\Data\DisplayData;
use Alathazal\DataforgedLaravel\Shared\Data\SourceData;
use Alathazal\DataforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class TruthSubtableEntryData extends Data
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
    ) {}
}
