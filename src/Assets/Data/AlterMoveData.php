<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Alathazal\StarforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AlterMoveData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        #[MapInputName('Moves')]
        public ?array $moves,

        #[MapInputName('Trigger')]
        public AlterMoveTriggerData|Optional $trigger,

        #[MapInputName('Text')]
        public ?string $text,

        /** IDs of asset abilities altered/extended by this one. */
        #[MapInputName('Alters')]
        public array $alters = [],

        #[MapInputName('Outcomes')]
        public ?AlterMoveOutcomesData $outcomes = null,

        /** The ID of the parent Asset of the move, if any. */
        #[MapInputName('Asset')]
        public ?string $asset = null,

        #[MapInputName('Progress Move')]
        public bool $progressMove = false,

        #[MapInputName('Variant of')]
        public ?string $variantOf = null,

        #[MapInputName('Oracles')]
        public array $oracles = [],

        #[MapInputName('Tags')]
        public array $tags = [],

        #[MapInputName('Suggestions')]
        public ?SuggestionsData $suggestions = null,
    ) {}
}
