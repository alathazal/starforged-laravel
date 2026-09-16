<?php

namespace Alathazal\StarforgedLaravel\Moves\Data;

use Alathazal\StarforgedLaravel\Shared\Data\RerollData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class OutcomeData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public ?string $id = null,

        public string $text = '',

        #[MapInputName('With a Match')]
        public ?self $withAMatch = null,

        #[MapInputName('Count as')]
        public ?string $countAs = null,

        #[MapInputName('Reroll')]
        public ?RerollData $reroll = null,

        #[MapInputName('In Control')]
        public ?bool $inControl = null,
    ) {}
}