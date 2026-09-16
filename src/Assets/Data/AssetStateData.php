<?php

namespace Alathazal\StarforgedLaravel\Assets\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class AssetStateData extends Data
{
    public function __construct(
        #[MapInputName('Name')]
        public string $name,

        #[MapInputName('Enabled')]
        public bool $enabled,

        #[MapInputName('Disables asset')]
        public bool $disablesAsset,

        #[MapInputName('Impact')]
        public bool $impact,

        #[MapInputName('Permanent')]
        public bool $permanent,
    ) {}
}
