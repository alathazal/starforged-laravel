<?php

namespace Alathazal\DataforgedLaravel\Assets\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class AlterMoveTriggerByData extends Data
{
    public function __construct(
        #[MapInputName('Player')]
        public bool $player,

        #[MapInputName('Ally')]
        public bool $ally,
    ) {}
}