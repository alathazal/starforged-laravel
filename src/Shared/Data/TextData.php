<?php

namespace Alathazal\StarforgedLaravel\Shared\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

/**
 * Represents an `IHasText` object, i.e. `{"Text": "..."}`.
 */
final class TextData extends Data
{
    public function __construct(
        #[MapInputName('Text')]
        public string $text,
    ) {}
}
