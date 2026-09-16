<?php

namespace Alathazal\StarforgedLaravel\Shared\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class RerollData extends Data
{
    public function __construct(
        #[MapInputName('Text')]
        public string $text,

        #[MapInputName('Dice')]
        public string $dice,
    ) {}
}
