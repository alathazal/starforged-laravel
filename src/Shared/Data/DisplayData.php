<?php

namespace Alathazal\StarforgedLaravel\Shared\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class DisplayData extends Data
{
    public function __construct(
        #[MapInputName('Title')]
        public ?string $title = null,

        #[MapInputName('Color')]
        public ?string $color = null,

        #[MapInputName('Icon')]
        public ?string $icon = null,
    ) {}
}
