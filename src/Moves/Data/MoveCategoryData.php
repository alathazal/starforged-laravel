<?php

namespace Alathazal\DataforgedLaravel\Moves\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class MoveCategoryData extends Data
{
    public function __construct(
        #[MapInputName('$id')]
        public string $id,

        public string $name,

        public string $description,

        /** @var MoveData[] */
        public array $moves,
    ) {}
}