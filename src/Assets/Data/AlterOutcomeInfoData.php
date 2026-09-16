<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Alathazal\StarforgedLaravel\Shared\Data\RerollData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class AlterOutcomeInfoData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public ?string $id = null,

        #[MapInputName('Text')]
        public ?string $text = null,

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
