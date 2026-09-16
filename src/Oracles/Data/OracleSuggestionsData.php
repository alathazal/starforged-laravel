<?php

namespace Alathazal\StarforgedLaravel\Oracles\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Alathazal\StarforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class OracleSuggestionsData extends Data
{
    public function __construct(
        public array $assets = [],
        public array $oracleRolls = [],
        public array $gameObjects = [],
    ) {}
}
