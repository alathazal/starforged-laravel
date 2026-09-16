<?php

namespace Alathazal\StarforgedLaravel\Oracles\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Alathazal\StarforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class OracleTableEntryData extends Data
{
    public function __construct(
        public string $id,
        public int $floor,
        public int $ceiling,
        public string $result,

        public ?string $summary = null,
        public ?OracleSuggestionsData $suggestions = null,

        /** @var OracleTableEntryData[] */
        public array $subtable = [],
    ) {}
}
