<?php

namespace Alathazal\StarforgedLaravel\Moves\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class MoveCategoryData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        public string $name,

        public string $description,

        /** @var MoveData[] */
        #[MapInputName('Moves')]
        #[DataCollectionOf(MoveData::class)]
        public DataCollection $moves,

        public ?DisplayData $display = null,

        #[MapInputName('Source')]
        public ?SourceData $source = null,

        public bool $optional = false,
    ) {}
}