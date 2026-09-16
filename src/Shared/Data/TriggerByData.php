<?php

namespace Alathazal\StarforgedLaravel\Shared\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class TriggerByData extends Data
{
    public function __construct(
        #[MapInputName('Player')]
        public bool $player = true,

        #[MapInputName('Ally')]
        public bool $ally = false,
    ) {}
}
