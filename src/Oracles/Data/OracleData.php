<?php

namespace Alathazal\DataforgedLaravel\Oracles\Data;

use Alathazal\DataforgedLaravel\Shared\Data\DisplayData;
use Alathazal\DataforgedLaravel\Shared\Data\SourceData;
use Alathazal\DataforgedLaravel\Shared\Data\SuggestionsData;
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
