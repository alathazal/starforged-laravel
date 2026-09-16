<?php

namespace Alathazal\StarforgedLaravel\MoveCategories\Data;

use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class MoveCategoryData extends Data
{
    public function __construct(

        #[MapInputName('$id')]
        public string $id,

        #[MapInputName('Name')]
        public string $name,

        #[MapInputName('Source')]
        public SourceData $source,

        #[MapInputName('Description')]
        public string $description,

        #[MapInputName('Display')]
        public DisplayData $display,

        #[MapInputName('Optional')]
        public bool $optional,
    ) {}
}