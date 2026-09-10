<?php

namespace Alathazal\DataforgedLaravel\Oracles\Data;

use Alathazal\DataforgedLaravel\Shared\Data\DisplayData;
use Alathazal\DataforgedLaravel\Shared\Data\SourceData;
use Alathazal\DataforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class OracleUsageData extends Data
{
    public function __construct(
        public ?bool $initial = null,
        public ?int $maxRolls = null,
        public ?bool $allowDuplicates = null,
        public ?array $suggestions = null,
    ) {}
}
