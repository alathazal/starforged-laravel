<?php

namespace Alathazal\StarforgedLaravel\Oracles\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Alathazal\StarforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class OracleData extends Data
{
    public function __construct(
        public string $id,
        public string $name,
        public ?string $category = null,
        public ?string $memberOf = null,
        public ?string $description = null,

        /** @var OracleTableEntryData[] */
        public array $table = [],

        /** @var OracleData[] */
        public array $oracles = [],

        public ?OracleDisplayData $display = null,
        public ?OracleUsageData $usage = null,
        public ?OracleContentData $content = null,
        public ?SourceData $source = null,
    ) {}
}
