<?php

namespace Alathazal\DataforgedLaravel\Shared\Data;

use Spatie\LaravelData\Data;

final class SuggestionsData extends Data
{
    public function __construct(
        public array $assets = [],
        public array $oracleRolls = [],
        public array $gameObjects = [],
    ) {}
}