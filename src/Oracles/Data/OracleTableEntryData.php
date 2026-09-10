<?php

namespace Alathazal\DataforgedLaravel\Oracles\Data;

use Alathazal\DataforgedLaravel\Shared\Data\DisplayData;
use Alathazal\DataforgedLaravel\Shared\Data\SourceData;
use Alathazal\DataforgedLaravel\Shared\Data\SuggestionsData;
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
