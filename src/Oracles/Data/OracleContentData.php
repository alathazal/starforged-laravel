<?php

namespace Alathazal\DataforgedLaravel\Oracles\Data;

use Alathazal\DataforgedLaravel\Shared\Data\DisplayData;
use Alathazal\DataforgedLaravel\Shared\Data\SourceData;
use Alathazal\DataforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class OracleContentData extends Data
{
    public function __construct(
        public array $partOfSpeech = [],
        public array $tags = [],
    ) {}
}
