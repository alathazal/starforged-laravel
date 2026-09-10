<?php

namespace Alathazal\DataforgedLaravel\Assets\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class AlterMoveTriggerData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        #[MapInputName('By')]
        public AlterMoveTriggerByData $by,
    ) {}
}