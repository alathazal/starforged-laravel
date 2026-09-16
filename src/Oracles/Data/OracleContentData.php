<?php

namespace Alathazal\StarforgedLaravel\Oracles\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Alathazal\StarforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class OracleContentData extends Data
{
    public function __construct(
        public array $partOfSpeech = [],
        public array $tags = [],
    ) {}
}
