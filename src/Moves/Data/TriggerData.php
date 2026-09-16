<?php

namespace Alathazal\StarforgedLaravel\Moves\Data;

use Alathazal\StarforgedLaravel\Shared\Data\TriggerByData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class TriggerData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public ?string $id,

        public string $text,

        #[MapInputName('By')]
        public ?TriggerByData $by = null,

        /** @var TriggerOptionData[] */
        #[MapInputName('Options')]
        #[DataCollectionOf(TriggerOptionData::class)]
        public DataCollection|Optional $options = new Optional,
    ) {}
}