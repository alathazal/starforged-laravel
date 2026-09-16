<?php

namespace Alathazal\StarforgedLaravel\Moves\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Alathazal\StarforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class MoveData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        public string|Optional $name,

        public string|Optional $category,

        public bool $optional = false,

        #[MapInputName('Progress Move')]
        public bool $progressMove = false,

        #[MapInputName('Variant of')]
        public ?string $variantOf = null,

        /** The ID of the parent Asset of the move, if this move belongs to an asset ability. */
        #[MapInputName('Asset')]
        public ?string $asset = null,

        public ?DisplayData $display = null,

        public ?TriggerData $trigger = null,

        public ?OutcomesData $outcomes = null,

        public ?string $text = null,

        #[MapInputName('Oracles')]
        public array $oracles = [],

        #[MapInputName('Tags')]
        public array $tags = [],

        #[MapInputName('Source')]
        public ?SourceData $source = null,

        #[MapInputName('Suggestions')]
        public ?SuggestionsData $suggestions = null,
    ) {}
}