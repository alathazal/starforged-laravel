<?php

namespace Alathazal\DataforgedLaravel\Oracles\Data;

use Alathazal\DataforgedLaravel\Shared\Data\DisplayData;
use Alathazal\DataforgedLaravel\Shared\Data\SourceData;
use Alathazal\DataforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class OracleDisplayData extends Data
{
    public function __construct(
        public ?string $title = null,
        public ?array $table = null,
        public ?string $columnOf = null,
    ) {}
}
