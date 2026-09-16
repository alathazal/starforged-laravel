<?php

namespace Alathazal\StarforgedLaravel\Encounters\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class EncounterVariantData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        public string $name,
        public int $rank,
        public string $nature,

        #[MapInputName('Variant of')]
        public string $variantOf,

        public ?string $description = null,

        public ?DisplayData $display = null,
        public ?SourceData $source = null,

        public ?array $tags = null,
    ) {}
}