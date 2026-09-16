<?php

namespace Alathazal\StarforgedLaravel\Shared\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class SourceData extends Data
{
    public function __construct(
        #[MapInputName('Title')]
        public string $title,

        #[MapInputName('Authors')]
        public array $authors = [],

        #[MapInputName('Date')]
        public ?string $date = null,

        #[MapInputName('Page')]
        public ?int $page = null,
    ) {}
}