<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Alathazal\StarforgedLaravel\Moves\Data\TriggerOptionData;
use Alathazal\StarforgedLaravel\Shared\Data\TriggerByData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class AlterMoveTriggerData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        #[MapInputName('By')]
        public ?TriggerByData $by = null,

        /** @var TriggerOptionData[] */
        #[MapInputName('Options')]
        #[DataCollectionOf(TriggerOptionData::class)]
        public DataCollection|Optional $options = new Optional,

        #[MapInputName('Text')]
        public ?string $text = null,
    ) {}
}