<?php

namespace Alathazal\StarforgedLaravel\Oracles\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Alathazal\StarforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class OracleGroupData extends Data
{
    public function __construct(
        public string $id,
        public string $name,
        public array $aliases = [],
        public ?string $description = null,
        public array $oracles = [],
        public ?DisplayData $display = null,
        public ?SourceData $source = null,
    ) {}
}