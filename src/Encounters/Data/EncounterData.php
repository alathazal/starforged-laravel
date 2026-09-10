<?php

namespace Alathazal\DataforgedLaravel\Encounters\Data;

use Alathazal\DataforgedLaravel\Shared\Data\DisplayData;
use Alathazal\DataforgedLaravel\Shared\Data\SourceData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class EncounterData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        public string $name,
        public string $nature,
        public string $summary,
        public int $rank,

        public string $description,

        #[MapInputName('Quest Starter')]
        public ?string $questStarter,

        public DisplayData $display,
        public SourceData $source,

        /** @var array<string> */
        public array $features = [],

        /** @var array<string> */
        public array $drives = [],

        /** @var array<string> */
        public array $tactics = [],

        /** @var EncounterVariantData[] */
        public array $variants = [],
    ) {}
}