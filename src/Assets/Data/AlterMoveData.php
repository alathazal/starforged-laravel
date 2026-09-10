<?php

namespace Alathazal\DataforgedLaravel\Assets\Data;

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
    ) {}
}
